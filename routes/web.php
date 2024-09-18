<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController as ApartmentController;
use App\Http\Controllers\HomeController as HomeController;
use App\Http\Controllers\PaymentController as PaymentController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Definizione rotte per l'entita' apartment con middlewere auth per richiesta log in
Route::middleware('auth')->group(function () {
    Route::get('/apartments/statistics', [ApartmentController::class, 'statistics'])->name('statistics'); // statistic of all the apartments
    Route::get('/apartments/trashed', [ApartmentController::class, 'trashed'])->name('apartments.trashed'); // bin of the apartments
    Route::delete('/apartments/{apartment:slug}/force', [ApartmentController::class, 'forceDestroy'])->name('apartments.forceDestroy'); // force destroy your apartment
    Route::patch('/apartments/{apartment}/restore', [ApartmentController::class, 'restore'])->name('apartments.restore'); // restore the apartment
    Route::resource('apartments', ApartmentController::class)->parameters([
        'apartments' => 'apartment:slug']); // all the views
    Route::get('/inbox', [HomeController::class, 'inbox'])->name('inbox'); // inbox with all your messages
    Route::patch('/inbox/{message}/seen', [HomeController::class, 'seen'])->name('message.seen'); // update the message seen date
    Route::get('/checkout', [PaymentController::class, 'getPaymentPage'])->name('checkout');
    Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');
});
