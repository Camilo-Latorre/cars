<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoriaController;


Route::apiResource('cars', CarController::class);
Route::get('/categorias/activas', [CategoriaController::class, 'activasConRegistros']);

