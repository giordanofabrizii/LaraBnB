<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController as ApartmentController;
use App\Models\Apartment;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/inbox', [App\Http\Controllers\HomeController::class, 'inbox'])->name('inbox');

// Definizione rotte per l'entita apartment con middlewere auth per richiesta log in
Route::middleware('auth')->group(function () {
    Route::resource("apartments",ApartmentController::class);
});
