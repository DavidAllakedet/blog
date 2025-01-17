<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

/* Route pour la page d'accueil */
Route::get('/', [PostController::class, 'index'])->name('index');

Route::get('/categories/{category}',[PostController::class,'postsByCategory'])->name('posts.byCategory');
Route::get('/tags/{tag}',[PostController::class,'postsByTag'])->name('posts.byTag');

/* Route pour afficher un article spécifique*/
Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');

