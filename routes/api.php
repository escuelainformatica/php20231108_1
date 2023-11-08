<?php

use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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

Route::middleware('auth:sanctum')->get('/user', [ApiController::class,'obtenerUsuario']);
Route::middleware('auth:sanctum')->get('/user_update', [ApiController::class,'obtenerUsuarioUpdate']);
Route::middleware(['auth:sanctum','ability:update'])->get('/user_update2', [ApiController::class,'obtenerUsuario']);
Route::post('/tokens/create',[ApiController::class,'crearToken']);
Route::post('/tokens/create_limitado',[ApiController::class,'crearTokenLimitado']);