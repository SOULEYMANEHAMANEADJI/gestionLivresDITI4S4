<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


Auth::routes();

// Routes protégées par le middleware auth
Route::middleware(['auth'])->group(function () {
    // Routes CRUD pour les livres
    Route::resource('books', BookController::class);
});