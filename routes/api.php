<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Api\PostController;
use  App\Http\Controllers\Api\UserController;

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


// posts
Route::get("/posts", [PostController::class,"index"])->middleware("auth:sanctum");

Route::get("/posts/{id}", [PostController::class,"show"]);

Route::post("/posts", [PostController::class,"store"]);

Route::post("/posts/{id}", [PostController::class,"update"]);

Route::delete("/posts/{id}", [PostController::class,"destroy"]);

// users
Route::get("/users", [UserController::class,"index"]);
Route::get("/users/{id}", [UserController::class,"show"]);
Route::delete("/users/{id}", [UserController::class,"destroy"]);


Route::post('/sanctum/token', function(Request $request){
    $request->validate([
        'email' =>'required|email',
        'password' =>'required',
        'device_name' =>'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if(!$user || !($request->password==$user->password)){
        throw validationException::withMessages([
            'email' =>['The provided credentials are incorrect.']
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});