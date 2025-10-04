<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/clientes', [ClienteController::class, 'createCliente']);

//Route::get('/clientes', [ClienteController::class, 'getClientes']);