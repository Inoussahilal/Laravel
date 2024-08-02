<?php

use Illuminate\Support\Facades\Route;
use 
App\Http\Controllers\AuthorController;
use 
App\Http\Controllers\BookController;
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::resource('authors',AuthorController::class);
Route::resource('books',BookController::class);
Route::get('/', function () {
    return view('welcome');
});
