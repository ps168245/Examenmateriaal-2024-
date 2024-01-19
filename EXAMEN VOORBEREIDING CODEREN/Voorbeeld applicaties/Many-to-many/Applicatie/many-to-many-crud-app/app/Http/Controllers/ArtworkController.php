<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Gets all Artworks
        $artworks = Artwork::all();
        // sends all Artworks to Artworks.index when going to http://127.0.0.1:8000/Artworks
        return view('artworks.index' ,['artworks' => $artworks]);
    }

    public function create()
    {
            // Haal alle kunstwerken op
            $artists = artist::all();
        return view('artworks.create', ['artists' => $artists]);
    }

    public function store(Request $request)
    {
        $newArtwork = new Artwork([
            'name' => $request->name,
            'art_picture' => $request->art_picture,
        ]);
    
        $newArtwork->save();
    
        // Attach selected artworks
        if ($request->has('artist')) {
            $newArtwork->artists()->attach($request->artist);
        }
        

        
    
        return redirect(route('artworks.index'));
    }


    /**
     * Display the specified resource.
     */

     public function show(Artwork $artwork)
     {
         return view('artworks.show', ['artwork' => $artwork]);
     }
 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artwork $artwork)
    {
                    // Haal alle artiesten op
                    $artists = Artist::all();
        return view('artworks.edit', ['artwork' => $artwork, 'artists' => $artists]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artwork $artwork)
    {
        $artwork->update([
            'name' => $request->name,
            'art_picture' => $request->art_picture,
        ]);
    
        // Sync selected artists
        if ($request->has('artists')) {
            $artwork->Artists()->sync($request->artists);
        } else {
            // If no artists are selected, detach all existing artists
            $artwork->artists()->detach();
        }
    
        return redirect(route('artworks.index'));
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy(artwork $artwork)
    {
    // Detach the artwork from all artworks
    $artwork->artists()->detach();

    // Delete the artwork
    $artwork->delete();

    return redirect(route('artworks.index'));
    }

}

