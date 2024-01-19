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
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255); // Maakt een VARCHAR kolom voor de naam van de artwork met een maximale lengte van 255 tekens
            $table->string('profile_picture', 255); // Maakt een kolom voor de foto voor de artist, maximale lengte van 255 tekens
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artists');
    }
};
