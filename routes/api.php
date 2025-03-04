<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// Manejo de solicitudes OPTIONS para evitar problemas con CORS
Route::options('{any}', function () {
    return response()->json([], 200, [
        'Access-Control-Allow-Origin' => 'http://localhost:5173',
        'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Requested-With',
        'Access-Control-Allow-Credentials' => 'true',
    ]);
})->where('any', '.*');

// Ruta para obtener el usuario autenticado
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas de productos con CORS habilitado
Route::middleware(['cors'])->group(function () {
    Route::apiResource('productos', ProductController::class);
});
