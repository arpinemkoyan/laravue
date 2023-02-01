<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\AuthorBook;
use App\Models\Book;
use Doctrine\Inflector\Rules\NorwegianBokmal\Inflectible;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book = $book->fill([
            'name' => $request->name
        ]);

        $book->save();

        $bookAuthors = new AuthorBook();
        foreach ($request->authors as $author) {
            $bookAuthors::create([
                'book_id' => $book->id,
                'author_id' => $author['id']
            ]);
        }


        return $book;

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $newBook = Book::find($book->id);
        $authors=$newBook->authors;
        return !$newBook
            ? response()->json([
                "status" => false,
                "book" => 'Book not found'
            ])
            : response()->json([
                "status" => true,
                "book" => $newBook,
                "authors" => $authors
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $book = Book::where(['id' => $id])
            ->update(['name' => $request->name]);


        return $book;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return Book::all();
    }
}
