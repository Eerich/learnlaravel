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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);
Route::get('/about', [\App\Http\Controllers\HomeController::class, 'about']);
Route::get('/{post}', [\App\Http\Controllers\HomeController::class, 'post'])
    ->where('post', '[0-9]+')->name('post');

//Route::prefix('/posts')->group(function(){
//    Route::get('', [\App\Http\Controllers\PostController::class, 'index']);
//    Route::get('/create', [\App\Http\Controllers\PostController::class, 'create']);
//    Route::post('', [\App\Http\Controllers\PostController::class, 'store']);
//    Route::get('/{post}', [\App\Http\Controllers\PostController::class, 'show'])
//        ->where('post', '[0-9]+');
//    Route::get('/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit'])
//        ->where('post', '[0-9]+');
//    Route::post('/{post}', [\App\Http\Controllers\PostController::class, 'update'])
//        ->where('post', '[0-9]+');
//    Route::get('/{post}/delete', [\App\Http\Controllers\PostController::class, 'destroy'])
//        ->where('post', '[0-9]+');
//});

Route::resource('posts', \App\Http\Controllers\PostController::class);

Route::middleware(['auth'])->group(function() {
//    Route::get('/home', function() {
//        return view('home');
//    })->name('home');

    Route::get('/user/profile', function() {
        return view('profile');
    })->name('profile');
});
