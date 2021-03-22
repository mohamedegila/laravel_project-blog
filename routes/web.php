<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\StorageFileController;
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

Route::group(['middleware' => ['auth']], function () {
    // Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    // Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    // Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    // Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    Route::get('/posts/ajax/show', [PostController::class, 'ajaxShow'])->name('posts.ajax.show');

    Route::get('/image/{filename}', [StorageFileController::class,'getPubliclyStorgeFile'])->name('image.displayImage');

    Route::get('/posts/{post}/restore', [PostController::class, 'restore'])->name('posts.restore');
    Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('posts.destroy');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    

    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
});

Route::get('/', function () {
    return view('welcome');
});
// Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('posts.destroy');
// Route::put('/posts', [PostController::class, 'update'])->name('posts.update');
// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
