<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('catalog', [CatalogController::class, 'getIndex']);

Route::put('/catalog/rent/{id}', [CatalogController::class, 'putRent']);
Route::put('/catalog/return/{id}', [CatalogController::class, 'putReturn']);
Route::delete('/catalog/delete/{id}', [CatalogController::class, 'deleteMovie']);

Route::get('catalog/show/{id}', [CatalogController::class, 'getShow']);

Route::get('catalog/create', [CatalogController::class, 'getCreate']);

Route::post('/catalog/create', [CatalogController::class, 'postCreate']);

Route::get('catalog/edit/{id}', [CatalogController::class, 'getEdit']);

Route::post('/catalog/edit/{id}', [CatalogController::class, 'edit']);