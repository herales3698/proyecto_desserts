<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function() {
    return view('auth/login');
});

Auth::routes();


Route::resource('inicio',App\Http\Controllers\inicio::class)->middleware('auth');

Route::resource('productos',App\Http\Controllers\ProductoController::class)->middleware('auth');

Route::resource('categorias',App\Http\Controllers\CategoriaController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\inicio::class, 'index'])->name('home');

