<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ChapterController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('mybooks')->name('books.')->group(function(){
    Route::get('/', [BooksController::class, 'index'])->name('index');
    Route::post('/', [BooksController::class, 'store'])->name('store');
    Route::post('/updatecontent/{id}', [BooksController::class, 'content_store'])->name('store_content');
    Route::get('/create', [BooksController::class, 'create'])->name('create');
    Route::get('/{id}', [BooksController::class, 'show'])->name('show');
});

Route::prefix('mychapter')->name('chapters.')->group(function(){
    Route::post('/',[ChapterController::class, 'store'])->name('store');
    Route::get('/{id}',[ChapterController::class, 'show'])->name('show');
    Route::put('/{id}',[ChapterController::class, 'update'])->name('update');
});

Route::prefix('tags')->name('tags.')->group(function(){
    Route::get('/{id}', [TagController::class, 'show'])->name('show');
});