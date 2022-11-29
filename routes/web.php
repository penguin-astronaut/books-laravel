<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BooksController;
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

Route::prefix('authors')->name('authors.')->controller(AuthorController::class)->group(function () {
   Route::get('/', 'index')->name('index');
   Route::get('/{id}', 'show')->name('show')->where('id', '\d+');;

   Route::middleware('admin')->group(function () {
       Route::put('/update/{id}', 'update')->name('update');
       Route::get('/delete/{id}', 'delete')->name('delete');
       Route::get('/create', 'create')->name('create');
       Route::post('/store', 'store')->name('store');
   });
});

Route::prefix('books')
    ->name('books.')
    ->controller(BooksController::class)
    ->group(function() {
        Route::get('/{id}', 'show')->name('show')->where('id', '\d+');

        Route::middleware('auth')->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');

            Route::put('/update/{id}', 'update')->name('update')->middleware('bookOwner');
            Route::get('/delete/{id}', 'delete')->name('delete')->middleware('bookOwner');;
        });
    }
);
