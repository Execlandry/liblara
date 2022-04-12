<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['namespace'=>'Api\V1'],function(){
    /* 
    this is what happens to reach here as the namespace is further added to api/v1
    
    http://127.0.0.1:8000/App/Http/Controllers/api/v1/
    
    */

    Route::group(['prefix' => 'books'], function () {

        /*
        /books/popular
        */
        // all Books
        // Route::get(['popular','BooksController@get_popular_books']);
        // Route::get('recommended','BooksController@get_recommended_books');
        // Route::get('test','BooksController@get_test_books');

        
        Route::middleware(['auth:sanctum'])->group(function () {
            Route::post('/register', [UserController::class, 'register']);
            Route::post('/login', [UserController::class, 'login']);
        });
    });
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
