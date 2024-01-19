<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creëer 3 boekrecords en associeer elk boek met de auteur 'Jan Smith'.
        // method 2 maar onhandig, maakt author aan.
        Book::factory(3)
            ->for(Author::factory()->state([
                'name' => 'Kees Steen'
            ]))
            ->create();
    }
}
