<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('isAdmin')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create']);
    Route::post('/posts/store', [PostController::class, 'store']);
    Route::get('/posts/edit/{id}', [PostController::class, 'edit']);
    Route::post('/posts/update/{id}', [PostController::class, 'update']);
    Route::get('/posts/delete/{id}', [PostController::class, 'delete']);
    Route::get('/tags/create', [TagController::class, 'create']);
    Route::post('/tags/store', [TagController::class, 'store']);
    Route::get('/tags/delete/{id}', [TagController::class, 'delete']);
});
Route::get('/posts', [PostController::class, 'posts']);
Route::get('/posts/show/{id}', [PostController::class, 'show']);
Route::get('/posts/search', [PostController::class, 'search']);
Route::get('/posts/latest', [PostController::class, 'latest']);
Route::get('/tags', [TagController::class, 'tags']);
Route::get('/tags/show/{id}', [TagController::class, 'show']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/handlelogin', [UserController::class, 'handlelogin']);
Route::get('/logout', [UserController::class, 'logout']);
