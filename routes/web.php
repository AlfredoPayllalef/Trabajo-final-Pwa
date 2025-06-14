<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;


Route::get('/', [HomeController::class, 'getHome']);
Route::get('/home', [HomeController::class, 'getHome'])->name('home');
Route::get('/nacionales', [CategoryController::class, 'getNacionales'])->name('nacionales');
    Route::get('/internacionales', [CategoryController::class, 'getInternacionales'])->name('internacionales');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

    
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store'); 
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/show/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/{post}/rate', [RatingController::class, 'store'])->name('ratings.store');
    Route::post('/category/{post}/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');


    
    Route::get('/misPosts', [CategoryController::class, 'misPosts'])->name('misPosts');

});

require __DIR__.'/auth.php';
