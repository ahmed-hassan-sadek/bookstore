<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Catcontroller;

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

Route::get('/', function () {
    return view('welcome');
});

// books CRAD

Route::get('/books' , [BookController::class , 'index']);
Route::get('/books/show/{id}' , [BookController::class , 'show']);
Route::get('/books/search/{word}' , [BookController::class , 'search']);


// category CRAD

Route::get('/category' , [Catcontroller::class , 'index']);
Route::get('/category/show/{id}' , [Catcontroller::class , 'show']);
Route::get('/category/search/{word}' , [Catcontroller::class , 'search']);



Route::middleware('auth')->group(function() {

    // books controll
    Route::get('/books/create' , [BookController::class , 'create']);
    Route::post('/books/store' , [BookController::class , 'store']);
    Route::get('/books/edit/{id}' , [BookController::class , 'edit'])->middleware('admin');
    Route::post('/books/update/{id}' , [BookController::class , 'update'])->middleware('admin');
    Route::get('/books/delete/{id}' , [BookController::class , 'delete'])->middleware('admin');

    // category controll

    Route::get('/category/create' , [Catcontroller::class , 'create']);
    Route::post('/category/store' , [Catcontroller::class , 'store']);
    Route::get('/category/edit/{id}' , [Catcontroller::class , 'edit'])->middleware('admin');
    Route::post('/category/update/{id}' , [Catcontroller::class , 'update'])->middleware('admin');
    Route::get('/category/delete/{id}' , [Catcontroller::class , 'delete'])->middleware('admin');
});
