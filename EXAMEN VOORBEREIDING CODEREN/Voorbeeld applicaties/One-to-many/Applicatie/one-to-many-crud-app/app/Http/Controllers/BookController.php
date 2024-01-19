<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Gets all books
        $books = Book::all();
        // sends all books to books.index when going to http://127.0.0.1:8000/books
        return view('books.index' ,['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {       
        // Gets all authors
        $authors = Author::all();
        return view('books.create',['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newBook = new Book([
            'title' => $request->title,
            'author_id' => $request->author_id,
        ]);
        $newBook->save();

        return redirect(route('books.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, book $book)
    {
        $book->update([
            'title' => $request->title,
        ]);
        // dd($book); // uncomment me to see the new data to be stored
        return redirect(route('books.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect(route('books.index'));
    }
}
