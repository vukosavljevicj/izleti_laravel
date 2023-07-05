<?php

use App\Http\Controllers\DrzavaController;
use App\Http\Controllers\TipController;
use App\Http\Controllers\IzletController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('drzave', DrzavaController::class);
    Route::resource('tipovi', TipController::class);
    Route::resource('izleti', IzletController::class);
});
