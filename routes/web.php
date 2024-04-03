<?php

use App\Http\Controllers\Admin\Posts\IndexController as AdminPostsIndexController;
use App\Http\Controllers\HomeController;
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
Route::get('/', [HomeController::class, 'index']);

Route::prefix('admin')->middleware('admin')->group(function () {
    //Route::get('/', )->name('admin.index');
    Route::prefix('posts')->group(function () {
        Route::get('/', AdminPostsIndexController::class)->name('admin.posts.index');
    });
});

Route::prefix('posts')->group(function () {
    Route::get('/', IndexController::class)->name('posts.index');

    Route::get('//create', CreateController::class)->name('posts.create');
    Route::post('/', StoreController::class)->name('posts.store');
    Route::get('/{post}', ShowController::class)->name('posts.show');
    Route::get('/{post}/edit', EditController::class)->name('posts.edit');
    Route::patch('/{post}', UpdateController::class)->name('posts.update');
    Route::delete('/{post}', DeleteController::class)->name('posts.delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
