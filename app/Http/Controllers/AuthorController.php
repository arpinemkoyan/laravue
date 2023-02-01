<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Author::all();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //add request validation
        $author = new Author();
        $author =$author->fill([
            'name' => $request->name,
            'first_name' => $request->first_name,
            'last_name'=> $request->last_name
        ]);

        $author->save();

        return $author;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $newAuthor = Author::find($author->id);
        $books=$newAuthor->books;

        return!$newAuthor
            ? response()->json([
                "status" => false,
                "author" => 'Author not found'
            ])
            : response()->json([
                "status" => true,
                "author" => $newAuthor,
                "books" => $books
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $author = Author::find($id);
        return response()->json($author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $author = Author::where(['id' => $author->id])
            ->update([
                'name' => $request->name,
                'first_name' => $request->first_name,
                'last_name'=> $request->last_name
                ]);


        return  response()->json([
            'author'=>$author,
            'status' =>true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return Author::all();
    }
}
