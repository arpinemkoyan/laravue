<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
//Route::resource('users', UserController::class);
//Route::get('api/users/register', [UserController::class, 'registration']);
//use App\Http\Controllers\;

//Route::post('/register',[UserController::class,'register']);

//Route::post('/login', [UserController::class, 'login']);
//Route::post('/logout', [UserController::class, 'signout']);

//Route::get('/users/login', [UserController::class, 'login'])->name('login');
//Route::get('/users/signout', [UserController::class, 'signOut'])->name('signout');


// posts routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('books', BookController::class);
    Route::post('/logout', [AuthController::class, 'logout']);

});

Route::post('/signup', [AuthController::class, 'sign_up']);
Route::post('/login', [AuthController::class, 'login']);


