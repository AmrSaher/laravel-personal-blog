<?php

use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home
Route::get('/', function () {
    return redirect()->route('posts.index');
})->name('home');
Route::get('about', AboutMeController::class)
    ->name('about-me');

// Auth
Auth::routes();

// Posts
Route::resource('posts', PostsController::class)
    ->names('posts');

// Categories
Route::prefix('categories')->middleware('auth')->group(function () {
    Route::get('create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/', [CategoriesController::class, 'store'])->name('categories.store');
});
