<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Sequence;


class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 5 author records, each with 3 associated books.
        // Method 1
        Author::factory(5)
            ->has(Book::factory()->count(3), 'books')
            ->create();

        // Create an author named 'Jan Smith' with 3 specific books.
        // Method 2 check bookseeder
        Author::factory()
            ->has(Book::factory() // relationship with book
                    ->count(3)
                    ->state(new Sequence(
                        ['title' => 'Koken met Jan'],
                        ['title' => 'Jan en pizzas'],
                        ['title' => 'De beste desserts'],
                    ))
            )
            ->create([
                'name' => 'Jan Smith',
            ]);
    }
}
