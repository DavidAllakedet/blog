<?php

use App\Http\Controllers\PostController;
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

/* Route pour la page d'accueil */
Route::get('/', [PostController::class, 'index'])->name('index');

Route::get('/categories/{category}',[PostController::class,'postsByCategory'])->name('posts.byCategory');

/* Route pour afficher un article spécifique*/
Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
