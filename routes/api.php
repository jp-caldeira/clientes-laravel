<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('/novo_cliente', [ClienteController::class, 'createCliente']);

Route::get('/clientes', [ClienteController::class, 'getClientes']);