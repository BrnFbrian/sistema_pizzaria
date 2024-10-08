<?php

use App\Http\Controllers\{
    FlavorController,
    UserController
};
use Illuminate\Support\Facades\Route;

Route::post('/login', [UserController::class, 'store']);
Route::post('/cadastrar', [UserController::class, 'store']);

Route::prefix('/user')->group(function (){
    Route::get('/', [UserController::class, 'index']);
    Route::put('/atualizar/{id}', [UserController::class, 'update']);
    Route::delete('/deletar/{id}', [UserController::class, 'destroy']);
    Route::get('/visualizar/{id}', [UserController::class, 'show']);
});

Route::prefix('/sabor')->group(function (){
    Route::post('/', [FlavorController::class, 'store']);
    Route::get('/', [FlavorController::class, 'index']);
    Route::put('/atualizar/{id}', [FlavorController::class, 'update']);
    Route::delete('/deletar/{id}', [FlavorController::class, 'destroy']);
    Route::get('/visualizar/{id}', [FlavorController::class, 'show']);
});
