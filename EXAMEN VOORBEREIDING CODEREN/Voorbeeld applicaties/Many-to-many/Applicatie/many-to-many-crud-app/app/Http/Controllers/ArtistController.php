<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Artwork;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Gets all artists
        $artists = Artist::all();
        // sends all artists to artists.index when going to http://127.0.0.1:8000/artists
        return view('artists.index' ,['artists' => $artists]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            // Haal alle kunstwerken op
            $artworks = Artwork::all();
        return view('artists.create', ['artworks' => $artworks]);
    }

    public function store(Request $request)
    {
        $newArtist = new Artist([
            'name' => $request->name,
            'profile_picture' => $request->profile_picture,
        ]);
    
        $newArtist->save();
    
        // Attach selected artworks
        if ($request->has('artwork')) {
            $newArtist->artworks()->attach($request->artwork);
        }
        

        
    
        return redirect(route('artists.index'));
    }
    
    /**
     * Display the specified resource.
     */

    public function show(artist $artist)
    {
        return view('artists.show', ['artist' => $artist]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
                    // Haal alle kunstwerken op
                    $artworks = Artwork::all();
        return view('artists.edit', ['artist' => $artist, 'artworks' => $artworks]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        $artist->update([
            'name' => $request->name,
            'profile_picture' => $request->profile_picture,
        ]);
    
        // Sync selected artworks
        if ($request->has('artworks')) {
            $artist->artworks()->sync($request->artworks);
        } else {
            // If no artworks are selected, detach all existing artworks
            $artist->artworks()->detach();
        }
    
        return redirect(route('artists.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
    // Detach the artist from all artworks
    $artist->artworks()->detach();

    // Delete the artist
    $artist->delete();

    return redirect(route('artists.index'));

    }
}
