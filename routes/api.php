<?php

use App\Http\Controllers\GoodController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\CharacteristicController;

Route::post('/categories', [CategoryController::class, 'store']);
Route::post('/goods', [GoodController::class, 'store']);
Route::post('/prices', [PriceController::class, 'store']);
Route::post('/stocks', [StockController::class, 'store']);
Route::post('/characteristics', [CharacteristicController::class, 'store']);

Route::get('/goods', [GoodController::class, 'index']);
?>
