<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LanguageController;

use App\Http\Controllers\PaymentController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('catalog', [CatalogController::class, 'getIndex']);

Route::put('/catalog/rent/{id}', [CatalogController::class, 'putRent']);
Route::put('/catalog/return/{id}', [CatalogController::class, 'putReturn']);
Route::delete('/catalog/delete/{id}', [CatalogController::class, 'deleteMovie']);

Route::get('catalog/show/{id}', [CatalogController::class, 'getShow']);

Route::get('/catalog/create', [CatalogController::class, 'getCreate'])->name('catalog.create');

Route::post('/catalog/create', [CatalogController::class, 'postCreate']);

Route::get('catalog/edit/{id}', [CatalogController::class, 'getEdit']);

Route::post('/catalog/edit/{id}', [CatalogController::class, 'edit']);

// Ruta para mostrar el formulario de pago
Route::get('/payment/{id}', [PaymentController::class, 'showPaymentForm'])->name('payment.show');

// Ruta para procesar el pago
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');

Route::get('catalog/show/{id}', [CatalogController::class, 'getShow'])->name('catalog.show');

Route::get('/catalog/listar', [CatalogController::class, 'listarPeliculas']);
Route::get('/catalog/grafica', [CatalogController::class, 'mostrarGrafico'])->name('catalog.grafico');


// Agrega una ruta para buscar películas
Route::get('/catalog/buscar', [CatalogController::class, 'buscarPeliculas'])->name('peliculas.buscar');

// Modifica la ruta existente para ver detalles de una película
Route::get('catalog/show/{id}', [CatalogController::class, 'getShow'])->name('catalog.show');


//tablas añadidas
Route::resource('directors', DirectorController::class);
Route::resource('countries', CountryController::class);
Route::resource('genres', GenreController::class);
Route::resource('languages', LanguageController::class);





