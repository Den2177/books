<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/books', [\App\Http\Controllers\BookController::class, 'index'])->name('books.index');

Route::post('/genres', [\App\Http\Controllers\GenreController::class, 'store'])->name('genre.store');
Route::post('/authors', [\App\Http\Controllers\AuthorController::class, 'store'])->name('author.store');
Route::post('/books', [\App\Http\Controllers\BookController::class, 'store'])->name('book.store');

Route::get('/authors/delete/{author}', [\App\Http\Controllers\AuthorController::class, 'destroy']);
Route::get('/genres/delete/{genre}', [\App\Http\Controllers\GenreController::class, 'destroy']);
Route::get('/books/delete/{book}', [\App\Http\Controllers\BookController::class, 'destroy']);
