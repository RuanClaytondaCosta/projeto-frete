<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FreteApiController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/fretes', [FreteApiController::class, 'index']);
Route::get('/fretes/filtrar', [FreteApiController::class, 'filtrar']);



