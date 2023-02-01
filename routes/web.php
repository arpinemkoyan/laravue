<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/{any}', function () {
    return view('home');
})->where('any', '.*');

Route::put('api/books/{id}', [BookController::class, 'update'])->name('books.update');
Route::post('api/books', [BookController::class, 'store'])->name('books.store');
Route::put('api/authors/{id}', [AuthorController::class, 'update'])->name('authors.update');
Route::post('api/authors', [AuthorController::class, 'store'])->name('authors.store');
