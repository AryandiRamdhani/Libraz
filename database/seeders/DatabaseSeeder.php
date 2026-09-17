<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Book;
use App\Models\Borrowing;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create User
        $user = User::create([
            'name' => 'Nadia Amanda Putri',
            'nis' => '2024108827',
            'password' => Hash::make('password123'),
            'role' => 'Siswa',
            'school_name' => 'SMAN 1 GARUDAPURA',
            'level' => 14,
            'level_name' => 'Kutu Buku Legendaris',
            'xp' => 2850,
            'max_xp' => 3000,
            'streak' => 18,
            'books_read' => 32,
            'total_hours_read' => 148,
        ]);

        // Create Books
        $book1 = Book::create([
            'title' => 'Fisika Kuantum Populer: Menembus Batas Realitas',
            'author' => 'Prof. Dr. Aris Danuarta • Balai Pustaka',
            'category' => '530.12 / FISIKA',
            'rack' => 'Rak 4A',
            'stock' => 3,
            'cover_image_url' => 'https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&w=150&q=80',
            'rating' => 4.9,
            'popularity_score' => 20,
        ]);

        $book2 = Book::create([
            'title' => 'Bumi Manusia',
            'author' => 'Pramoedya Ananta Toer • Hasta Mitra',
            'category' => '813.01 / NOVEL',
            'rack' => 'Rak 2B',
            'stock' => 0, // Out of stock to show "Dipinjam" status in UI
            'cover_image_url' => 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=150&q=80',
            'rating' => 5.0,
            'popularity_score' => 50,
        ]);
        
        $book3 = Book::create([
            'title' => 'Kimia Dasar Farmasi',
            'author' => 'Prof. Dr. apt. Haris Setiawan • 2022',
            'category' => '540 / KIMIA',
            'rack' => 'RAK C-04',
            'stock' => 2,
            'cover_image_url' => 'https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&w=150&q=80',
            'rating' => 4.5,
            'popularity_score' => 15,
        ]);

        $book4 = Book::create([
            'title' => 'Filosofi Teras',
            'author' => 'Henry Manampiring • Non-Fiksi',
            'category' => '100 / FILSAFAT',
            'rack' => 'RAK A-02',
            'stock' => 1,
            'cover_image_url' => 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=150&q=80',
            'rating' => 4.8,
            'popularity_score' => 40,
        ]);

        // Popular Books
        Book::create([
            'title' => 'Atomic Habits',
            'author' => 'James Clear • Self Development',
            'category' => '158.1 / CLE',
            'rack' => 'Rak 158.1 CLE',
            'stock' => 5,
            'cover_image_url' => 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=100&q=80',
            'rating' => 4.9,
            'popularity_score' => 48,
        ]);

        Book::create([
            'title' => 'Matematika Peminatan',
            'author' => 'Kemendikbudristek • Sains & Tek',
            'category' => '510 / KEM',
            'rack' => 'Rak 510 KEM',
            'stock' => 10,
            'cover_image_url' => 'https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&w=100&q=80',
            'rating' => 4.2,
            'popularity_score' => 39,
        ]);

        Book::create([
            'title' => 'Laut Bercerita',
            'author' => 'Leila S. Chudori • Sastra Fiksi',
            'category' => '899.2 / CHU',
            'rack' => 'Rak 899.2 CHU',
            'stock' => 2,
            'cover_image_url' => 'https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=100&q=80',
            'rating' => 4.7,
            'popularity_score' => 35,
        ]);

        // Create Borrowings for User
        // 1 Active Borrowing (Safe)
        Borrowing::create([
            'user_id' => $user->id,
            'book_id' => $book3->id,
            'borrowed_at' => Carbon::now()->subDays(5),
            'due_date' => Carbon::now()->addDays(2), // 2 days left
            'renew_count' => 0,
            'fine_amount' => 0,
        ]);

        // 1 Late Borrowing
        Borrowing::create([
            'user_id' => $user->id,
            'book_id' => $book4->id,
            'borrowed_at' => Carbon::now()->subDays(17),
            'due_date' => Carbon::now()->subDays(3), // Late by 3 days
            'renew_count' => 1,
            'fine_amount' => 3000,
        ]);
    }
}
