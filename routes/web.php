<?php

use App\Http\Controllers\Posts\CreateController;
use App\Http\Controllers\Posts\DeleteController;
use App\Http\Controllers\Posts\EditController;
use App\Http\Controllers\Posts\IndexController;
use App\Http\Controllers\Posts\ShowController;
use App\Http\Controllers\Posts\StoreController;
use App\Http\Controllers\Posts\UpdateController;
use Illuminate\Support\Facades\Route;

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


Route::get('/posts', IndexController::class)->name('posts.index');

Route::get('/posts/create', CreateController::class)->name('posts.create');
Route::post('/posts', StoreController::class)->name('posts.store');
Route::get('/posts/{post}', ShowController::class)->name('posts.show');
Route::get('/posts/{post}/edit', EditController::class)->name('posts.edit');
Route::patch('/posts/{post}', UpdateController::class)->name('posts.update');
Route::delete('/posts/{post}', DeleteController::class)->name('posts.delete');
