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
        Schema::create('authors', function (Blueprint $table) {
            $table->id(); // Maakt een auto-increment 'id' kolom
            $table->string('name'); // Maakt een kolom voor de naam van de auteur
            $table->timestamps(); // Voegt 'created_at' en 'updated_at' tijdstempelkolommen toe
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors'); // Verwijdert de 'authors' tabel
    }
};

