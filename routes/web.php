<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthenticatedSessionController;



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

//www.Tamazgha.com
//www.Tamazgha.com/

// Using closure
//Route::get('/', function () {
  //  return view('welcome');
//});

//Using controller

//To welcome page
Route::get('/', [WelcomeController::class,'index'])->name('azul.index');

//To blog page
Route::get('/journal', [BlogController::class, 'index'])->name('journal.index');

// To create post
Route::get('/journal/create', [BlogController::class, 'create'])->name('journal.create')->middleware('auth');


// To single post
Route::get('/journal/{post:slug}', [BlogController::class, 'show'])->name('journal.show');


// To edit single post
Route::get('/journal/{post}/edit', [BlogController::class, 'edit'])->name('journal.edit');


// To update single post
Route::put('/journal/{post}', [BlogController::class, 'update'])->name('journal.update');


// To update single post
Route::delete('/journal/{post}', [BlogController::class, 'delete'])->name('journal.delete');


// To store post to the DB
Route::post('/journal', [BlogController::class, 'store'])->name('journal.store');


// To about page
Route::get('/about', function(){
    return view('about');
})->name('about');

// Category resource controller
Route::resource('/categories', CategoryController::class);

//To contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::get('/dashboard', function(){
  return view('dashboard');
}) -> middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';