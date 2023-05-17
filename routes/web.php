<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', function () {
        return view('layouts.app');
    });


    //Finca
    Route::get('/finca/restablecer/{id}', [App\Http\Controllers\FincaController::class, 'restablecer'])->name('finca.restablecer');

    // Resource
    Route::resource('temporada', App\Http\Controllers\TemporadaController::class);
    Route::resource('finca', App\Http\Controllers\FincaController::class);
});
