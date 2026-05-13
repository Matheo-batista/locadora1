<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\SistemaController;

Route::get('/', [SistemaController::class, 'login']);
Route::post('/logar', [SistemaController::class, 'logar']);

Route::get('/logout', function () {
    session()->flush();
    return redirect('/');
}); 

Route::get('/carros', [SistemaController::class, 'listar']);
Route::get('/carros/novo', [SistemaController::class, 'novo']);
Route::post('/carros/store', [SistemaController::class, 'salvar']);

Route::get('/editar/{id}', [SistemaController::class, 'editar']);
Route::post('/update/{id}', [SistemaController::class, 'update']);
Route::get('/excluir/{id}', [SistemaController::class, 'excluir']);

Route::get('/agendar/{id}', [SistemaController::class, 'agendar']);
Route::post('/agendar/store/{id}', [SistemaController::class, 'salvarAgendamento']);
Route::get('/finalizar/{id}', [SistemaController::class, 'finalizar']);
