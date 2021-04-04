<?php

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

Auth::routes();

Route::name('blog.')->prefix('blog')->group(function () {
    Route::post('/publish', [App\Http\Controllers\BlogController::class, 'publish']);
    Route::get('/preview/{id}', [App\Http\Controllers\BlogController::class, 'private'])->name('preview');
    Route::resource('posts', 'App\Http\Controllers\BlogController');
    Route::resource('drafts', 'App\Http\Controllers\DraftsController');
    Route::resource('tags', 'App\Http\Controllers\TagController');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/school', [App\Http\Controllers\MainController::class, 'school'])->name('school');
Route::get('/search', [App\Http\Controllers\MainController::class, 'search'])->name('search');
