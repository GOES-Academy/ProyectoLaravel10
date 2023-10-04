<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('usuarios')->group(function () {
    Route::get('/lista', [UsuarioController::class, 'listaUsuarios']); // Listado de usuarios
    Route::get('/obtener/{nombre}', [UsuarioController::class, 'obtenerUsuarioGet']); // Obtener un usuario por nombre (GET)
    Route::post('/obtener', [UsuarioController::class, 'obtenerUsuarioPost']); // Obtener un usuario por nombre (POST)
});