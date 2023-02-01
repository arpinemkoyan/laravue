<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserController;

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

//Route::get('/', function () {
//    return view('index');
//});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/{any}', function () {
    return view('home');
})->where('any', '.*');

Route::put('api/books/{id}', [BookController::class, 'update']);
Route::post('api/books', [BookController::class, 'store']);
Route::put('api/authors/{id}', [AuthorController::class, 'update']);
Route::post('api/authors', [AuthorController::class, 'store']);
//Route::post('api/users/registration', [UserController::class, 'registration'])->name('users.registration');
