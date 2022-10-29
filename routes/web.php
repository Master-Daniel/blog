<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\PostController;
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

Route::get('/', [pagesController::class, 'home'])->name('home');
Route::get('/contact', [pagesController::class, 'contact'])->name('contact');
Route::get('/about', function() {
    abort('404');
})->name('about');
Route::post('/search/', [PostController::class, 'search']);
Route::get('/posts/details/{post_slug}', [PostController::class, 'show']);
Route::post('subscription', [pagesController::class, 'subscription']);

Route::prefix('dashboard')->middleware('auth')->group(function() {

    //////// CATEGORY ROUTE /////////////
    Route::prefix('category')->group(function() {
        Route::get('list', [CategoryController::class, 'index'])->name('category.list');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->where('id', '[0-9]+');
        Route::get('delete/{id}', [CategoryController::class, 'destroy'])->where('id', '[0-9]+');
        Route::post('update', [CategoryController::class, 'update']);
        Route::post('create', [CategoryController::class, 'store']);
    });

    //////////// POST ROUTE ////////////////
    Route::prefix('posts')->group(function() {
        Route::get('add-new', [PostController::class, 'create'])->name('create.post');
        Route::get('list', [PostController::class, 'index'])->name('list.post');
        Route::get('delete/{id}', [PostController::class, 'destroy'])->where('id', '[0-9]+');
        Route::get('edit/{id}', [PostController::class, 'edit'])->where('id', '[0-9]+');
        Route::post('add-new', [PostController::class, 'store'])->name('create.post');
    });

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
