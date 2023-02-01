<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Model;

class AuthorService
{
    public function createAuthor($data){

        $author = new Author();

        $author->fill([
            'name' => $data->name,
            'first_name' => $data->first_name,
            'last_name' => $data->last_name
        ]);

        $author->save();

        return $author;
    }

}
