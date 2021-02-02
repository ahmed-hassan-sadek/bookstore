<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiBookController;
use App\Http\Controllers\ApiCatController;
use App\Http\Controllers\ApiAuthControler;



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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// CRAD Books

Route::get('books' , [ApiBookController::class , 'index']); 
Route::get('books/show/{id}' , [ApiBookController::class , 'show']);



// CRAD Category

Route::get('category' , [ApiCatController::class , 'index']);
Route::get('category/show/{id}' , [ApiCatController::class , 'show']);

// midellware

Route::middleware('auth:sanctum')->group(function(){
    // category
    Route::post('category/store' , [ApiCatController::class , 'store']);
    Route::post('category/update/{id}' , [ApiCatController::class , 'update']);
    Route::get('category/delete/{id}' , [ApiCatController::class , 'delete']);

    // books
    Route::post('books/store' , [ApiBookController::class , 'store']);
    Route::post('books/update/{id}' , [ApiBookController::class , 'update']);
    Route::get('books/delete/{id}' , [ApiBookController::class , 'delete']);

    


});

// token
Route::post('register' , [ApiAuthControler::class , 'register']);