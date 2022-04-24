<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\Auth\AuthsController;
use App\Http\Controllers\Api\V1\UserSpecs\UsersController;
use App\Http\Controllers\Api\V1\UserOperations\AuthorsController;
use App\Http\Controllers\Api\V1\UserOperations\BooksController;
use App\Http\Controllers\Api\V1\UserSpecs\Controller;




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
        Route::post('/register', [AuthsController::class, 'register']);
        Route::post('/login', [AuthsController::class, 'login']);
    });




    
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::apiResource('/authors',AuthorsController::class);
        Route::apiResource('/books',BooksController::class);



        //      Route::group(['prefix' => 'books'], function () {
                
        // });
    });
});

  



