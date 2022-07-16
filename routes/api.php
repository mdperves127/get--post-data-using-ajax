<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
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

Route::get('/comments/{id}', [CommentsController::class, 'index'])->name('comments.index');
Route::post('/comments/{id}', [CommentsController::class, 'store'])->name('comments.store');

Route::get('/posts', [PostsController::class, 'getPosts'])->name('posts.get');

