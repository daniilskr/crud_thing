<?php

use App\Http\Controllers\Backoffice\BooksController as BackofficeBooksController;
use App\Http\Controllers\Backoffice\AuthorsController as BackofficeAuthorsController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('backoffice')->name('backoffice.')->group(function () {
    Route::resource('books', BackofficeBooksController::class);
    Route::resource('authors', BackofficeAuthorsController::class);
});

Route::get('/', [CatalogController::class, 'index'])->name('catalog');
