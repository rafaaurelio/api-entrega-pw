<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/vendedores', [VendedorController::class, 'listar']);
Route::get('/vendedores/{id}', [VendedorController::class, 'listarPorId']);
Route::post('/vendedores', [VendedorController::class, 'criar']);
Route::put('/vendedores/{id}', [VendedorController::class, 'editar']);
Route::delete('/vendedores/{id}', [VendedorController::class, 'excluir']);


Route::get('/produtos', [ProdutoController::class, 'listar']);
Route::get('/produtos/{id}', [ProdutoController::class, 'listarPorId']);
Route::post('/produtos', [ProdutoController::class, 'criar']);
Route::put('/produtos/{id}', [ProdutoController::class, 'editar']);
Route::delete('/produtos/{id}', [ProdutoController::class, 'excluir']);
