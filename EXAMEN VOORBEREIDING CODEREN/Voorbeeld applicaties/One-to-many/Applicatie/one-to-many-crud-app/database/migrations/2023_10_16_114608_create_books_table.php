<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Maakt een auto-increment 'id' kolom
            $table->string('title'); // Maakt een kolom voor de titel van het boek
            $table->foreignId('author_id')->constrained(); // Maakt een 'author_id' kolom als een foreign key naar een andere tabel (vermoedelijk de tabel 'authors')
            $table->timestamps(); // Voegt 'created_at' en 'updated_at' tijdstempelkolommen toe
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books'); // Verwijdert de 'books' tabel
    }
};
