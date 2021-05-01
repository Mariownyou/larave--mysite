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

Route::redirect('/', 'home');
Route::redirect('/blog/preview/{id}', '/preview/{id}');

Auth::routes();
Route::post('/logout', [App\Http\Controllers\MainController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::view('/new', 'includes.editor.new_editor');

Route::name('blog.')->group(function () {
    Route::post('/publish', [App\Http\Controllers\BlogController::class, 'publish'])
        ->name('publish')
        ->middleware('auth');
    Route::post('/delete', [App\Http\Controllers\BlogController::class, 'delete'])
        ->name('delete')
        ->middleware('auth');
    Route::post('/file_upload', [App\Http\Controllers\MainController::class, 'file_upload'])
        ->name('file_upload')
        ->middleware('auth');

    Route::get('/preview/{id}', [App\Http\Controllers\BlogController::class, 'private'])->name('preview');
    Route::resource('posts', 'App\Http\Controllers\BlogController');
    Route::resource('drafts', 'App\Http\Controllers\DraftsController')->middleware('auth');
    Route::resource('tags', 'App\Http\Controllers\TagController');
});

Route::name('school.')->prefix('school')->group(function () {
    Route::get('/', [App\Http\Controllers\MainController::class, 'school'])->name('index');

    Route::name('math.')->prefix('math')->group(function () {
        Route::view('/', 'school.math.index')->name('index');
        Route::resource('n', 'App\Http\Controllers\MathController');
        Route::resource('t', 'App\Http\Controllers\MathController');
    });
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [App\Http\Controllers\BlogController::class, 'search'])->name('search');
