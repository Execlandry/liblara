<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\UserSpecs\UserController;
use App\Http\Controllers\Api\V1\UserOperations\CommentController;
use App\Http\Controllers\Api\V1\UserOperations\LikeController;
use App\Http\Controllers\Api\V1\UserOperations\BookController;



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

    Route::group(['prefix' => 'auth'], function () {
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
    });





    Route::middleware(['auth:sanctum'])->group(function () {
        //user auth
        Route::post('/logout', [AuthController::class,'logout']);
        Route::get('/user', [UserController::class,'index']);



             Route::group(['prefix' => 'books'], function () {
        //book operations
                Route::get('/acc', [BookController::class, 'index']);//all books
                Route::post('/acc/create', [BookController::class, 'store']);// create book
                Route::get('/acc/{id}', [BookController::class, 'show']);//get single book
                Route::put('/acc/{id}', [BookController::class, 'update']);//update book
                Route::delete('/acc/{id}', [BookController::class, 'destroy']);//delete book

        //comment
            Route::get('/acc/{id}/comments', [CommentController::class, 'index']);//all comments of a post
            Route::post('/acc/{id}/comments', [CommentController::class, 'store']);// create comment on a post
            Route::put('/comments/{id}', [CommentController::class, 'update']);//update a comment
            Route::delete('/comments/{id}', [CommentController::class, 'destroy']);//delete a comment
            
        //like
            Route::post('/acc/{id}/likes', [LikeController::class, 'likeOrUnlike']); //like or dislike back a book   
        });
    });
});

    // Route::group(['prefix' => 'books'], function () {
    //     /*
    //     /books/popular
    //     */
    //     all Books
    //     Route::get(['popular','BooksController@get_popular_books']);
    //     Route::get('recommended','BooksController@get_recommended_books');
    //     Route::get('test','BooksController@get_test_books');




