<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController as ApartmentController;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/statistics', [ApartmentController::class, 'getViewsData']);

Route::get('/apartments', [ApiController::class, 'index'])->name('api.apartment.index');
Route::get('apartments/{apartment}', [ApiController::class, 'show'])->name('api.apartment.show');