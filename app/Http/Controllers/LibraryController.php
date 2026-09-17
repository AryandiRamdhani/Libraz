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
}
