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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');

// Route::get('/post', PostController@show)->name('post')

Route::middleware('auth')->group(function(){

    Route::get('/admin/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    
    Route::get('/admin/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    
    Route::post('/admin/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    
    Route::delete('/admin/posts/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
    
    Route::patch('/admin/posts/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    
    Route::get('/admin/posts/{post}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    
    Route::get('/admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('users.user-profile.show');
    
    Route::put('/admin/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');

    
    
    
});

Route::middleware('role:Admin')->group(function(){
    Route::get('/admin/users/', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::delete('/admin/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
});