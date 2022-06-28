<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\Auth\Api\RegistroController;
use App\Http\Controllers\Api\TurmaController;
use App\Http\Controllers\Api\AlunoController;
use App\Http\Controllers\ListAlunoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('turmas', [TurmaController::class, 'index']);

Route::get('turmas/{turma}', [TurmaController::class, 'show']);

Route::post('turmas', [TurmaController::class, 'store']);

Route::put('turmas/{turma}', [TurmaController::class, 'update']);;

Route::delete('turmas/{turma}', [TurmaController::class, 'destroy']);


Route::apiResource('turmas.alunos', App\Http\Controllers\Api\AlunoController::class)->only(['index']);


Route::get('alunos', [ListAlunoController::class, 'index']);

Route::get('alunos/{aluno}', [ListAlunoController::class, 'show']);

Route::post('alunos', [ListAlunoController::class, 'store']);

Route::put('alunos/{aluno}', [ListAlunoController::class, 'update']);

Route::delete('alunos/{aluno}', [ListAlunoController::class, 'destroy']);


Route::prefix('auth')->group(function() {

    Route::post('login', [LoginController::class, 'login']);

    Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

    Route::post('registro', [RegistroController::class, 'registro']);
});