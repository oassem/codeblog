<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;

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
Route::get('/posts', [PostController::class, 'posts']);
Route::get('/posts/show/{id}', [PostController::class, 'show']);
Route::get('/posts/search', [PostController::class, 'search']);
Route::get('/posts/latest', [PostController::class, 'latest']);
Route::get('/tags', [TagController::class, 'tags']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts/store', [PostController::class, 'store']);
Route::get('/posts/edit/{id}', [PostController::class, 'edit']);
Route::post('/posts/update/{id}', [PostController::class, 'update']);
Route::get('/posts/delete/{id}', [PostController::class, 'delete']);
