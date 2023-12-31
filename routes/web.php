<?php

use App\Http\Controllers\AnasController;
use App\Http\Controllers\ReferalController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [AnasController::class, 'index']);
Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/referal-process',[ReferalController::class, 'processForm'])->name('referal.process');
Route::get('/referal',[ReferalController::class, 'index'])->name('referal');