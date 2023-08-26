<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;

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

//Home page
Route::get('/', [HomeController::class, 'index'])
->middleware(['auth', 'verified'])
->name('index');

//Pagina tutti i progetti
Route::get('/progetti', [ProjectController::class, 'index'])
->middleware(['auth', 'verified'])
->name('projects.index');

//Crezione progetto
Route::get('/progetti/aggiungi', [ProjectController::class, 'create'])
->middleware(['auth', 'verified'])
->name('projects.create');

Route::post('/progetti/aggiungi', [ProjectController::class, 'store'])
->name('projects.store');

//Aggiornamento progetto
Route::get('/progetti/modifica/{id}', [ProjectController::class, 'edit'])
->middleware(['auth', 'verified'])
->name('projects.edit');

Route::put('/progetti/modifica/{id}', [ProjectController::class, 'update'])
->name('projects.update');

//Eliminazione progetto
Route::delete('/progetti/elimina/{id}', [ProjectController::class, 'destroy'])
->name('projects.destroy');

//Pagina progetto singolo
Route::get('/progetti/{id}', [ProjectController::class, 'show'])
->middleware(['auth', 'verified'])
->name('projects.show');