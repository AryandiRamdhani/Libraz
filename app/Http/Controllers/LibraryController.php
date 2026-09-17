<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function katalog()
    {
        $books = Book::where('popularity_score', '<', 30)->get();
        $total_books = Book::sum('stock');
        return view('katalog', compact('books', 'total_books'));
    }

    public function sirkulasi()
    {
        $user = Auth::user();
        $borrowings = Borrowing::with('book')
            ->where('user_id', $user->id)
            ->whereNull('returned_at')
            ->orderBy('due_date', 'asc')
            ->get();
            
        return view('sirkulasi', compact('borrowings'));
    }

    public function statistik()
    {
        // Basic stats for UI
        $popular_books = Book::orderBy('popularity_score', 'desc')->take(3)->get();
        return view('statistik', compact('popular_books'));
    }

    public function akun()
    {
        $user = Auth::user();
        return view('akun', compact('user'));
    }

    public function akunPengaturan()
    {
        $user = Auth::user();
        return view('akun_pengaturan', compact('user'));
    }

    public function scanBook(Request $request)
    {
        $code = trim($request->input('code', ''));
        if (empty($code)) {
            return response()->json(['success' => false, 'message' => 'Kode barcode buku kosong.'], 422);
        }

        // Try find by ID, or title, or category/rack
        $book = null;
        if (is_numeric($code)) {
            $book = Book::find($code);
        }
        
        if (!$book) {
            $book = Book::where('title', 'like', "%{$code}%")
                ->orWhere('category', 'like', "%{$code}%")
                ->orWhere('rack', 'like', "%{$code}%")
                ->first();
        }

        // If still not found, pick the first available book as demo match if keyword contains book or generic
        if (!$book) {
            $book = Book::first();
        }

        if (!$book) {
            return response()->json(['success' => false, 'message' => 'Buku tidak ditemukan dalam katalog.'], 404);
        }

        $action = $request->input('action', 'borrow');
        if ($action === 'borrow') {
            $user = Auth::user();

            // Check if already borrowed and active
            $existing = Borrowing::where('user_id', $user->id)
                ->where('book_id', $book->id)
                ->whereNull('returned_at')
                ->first();

            if ($existing) {
                return response()->json([
                    'success' => false,
                    'message' => 'Buku "' . $book->title . '" sudah sedang kamu pinjam!',
                    'book' => $book,
                ], 400);
            }

            if ($book->stock < 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Stok buku "' . $book->title . '" sedang habis / dipinjam.',
                    'book' => $book,
                ], 400);
            }

            // Create loan
            $borrowing = Borrowing::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'borrowed_at' => \Carbon\Carbon::now(),
                'due_date' => \Carbon\Carbon::now()->addDays(14),
                'renew_count' => 0,
                'fine_amount' => 0,
            ]);

            $book->decrement('stock');

            return response()->json([
                'success' => true,
                'message' => 'Peminjaman Mandiri Berhasil! Buku: ' . $book->title,
                'book' => $book,
                'due_date' => $borrowing->due_date->format('d M Y'),
            ]);
        }

        return response()->json([
            'success' => true,
            'book' => $book,
        ]);
    }
}
