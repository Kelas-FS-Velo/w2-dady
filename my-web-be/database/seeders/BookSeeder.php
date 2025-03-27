<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Laravel for Beginners',
            'author' => 'John Doe',
            'isbn' => '978-1234567890',
            'category' => 'Programming',
            'published_year' => 2022,
            'stock' => 5
        ]);

        Book::create([
            'title' => 'Mastering React.js',
            'author' => 'Jane Smith',
            'isbn' => '978-0987654321',
            'category' => 'Web Development',
            'published_year' => 2021,
            'stock' => 10
        ]);

        \App\Models\Book::factory(10)->create();
    }
}
