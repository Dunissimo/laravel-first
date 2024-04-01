<?php

use App\Http\Controllers\posts\CreateController;
use App\Http\Controllers\posts\DeleteController;
use App\Http\Controllers\posts\EditController;
use App\Http\Controllers\posts\IndexController;
use App\Http\Controllers\posts\ShowController;
use App\Http\Controllers\posts\StoreController;
use App\Http\Controllers\posts\UpdateController;
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
