<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\ProfileController;
use App\Models\Artist;
use App\Models\Artwork;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $artists = Artist::all(); // Fetch artists from the database, adjust as needed
    return view('artists.index', ['artists' => $artists]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Method 1:
Route::resources([
    'artists' => ArtistController::class,
    'artworks' => ArtworkController::class,
]);

// Method 2:
// Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
// Route::get('/artists/create', [ArtistController::class, 'create'])->name('artists.create');
// Route::post('/artists', [ArtistController::class, 'store'])->name('artists.store');
// Route::get('/artists/{artist}', [ArtistController::class, 'show'])->name('artists.show');
// Route::get('/artists/{artist}/edit', [ArtistController::class, 'edit'])->name('artists.edit');
// Route::put('/artists/{artist}', [ArtistController::class, 'update'])->name('artists.update');
// Route::delete('/artists/{artist}', [ArtistController::class, 'destroy'])->name('artists.destroy');

// Route::get('/artworks', [ArtworkController::class, 'index'])->name('artworks.index');
// Route::get('/artworks/create', [ArtworkController::class, 'create'])->name('artworks.create');
// Route::post('/artworks', [ArtworkController::class, 'store'])->name('artworks.store');
// Route::get('/artworks/{artwork}', [ArtworkController::class, 'show'])->name('artworks.show');
// Route::get('/artworks/{artwork}/edit', [ArtworkController::class, 'edit'])->name('artworks.edit');
// Route::put('/artworks/{artwork}', [ArtworkController::class, 'update'])->name('artworks.update');
// Route::delete('/artworks/{artwork}', [ArtworkController::class, 'destroy'])->name('artworks.destroy');
require __DIR__.'/auth.php';
