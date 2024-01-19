<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Gets all authors
        $authors = Author::all();
        // sends all authors to authors.index when going to http://127.0.0.1:8000/authors
        return view('authors.index' ,['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newAuthor = new Author([
            'name' => $request->name,
        ]);

        $newAuthor->save();

        return redirect(route('authors.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(author $author)
    {
        return view('authors.show', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(author $author)
    {
        return view('authors.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, author $author)
    {
        $author->update([
            'name' => $request->name,
        ]);

        return redirect(route('authors.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(author $author)
    {
        $author->delete();

        return redirect(route('authors.index'));
    }
}
