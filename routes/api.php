<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas de productos sin middleware incorrecto
Route::apiResource('productos', ProductController::class);

// Responder a solicitudes OPTIONS para CORS
Route::options('{any}', function () {
    return response()->json([], 200, [
        'Access-Control-Allow-Origin' => 'http://localhost:5173',
        'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
        'Access-Control-Allow-Headers' => 'Content-Type, X-Requested-With',
        'Access-Control-Allow-Credentials' => 'true',
    ]);
})->where('any', '.*');
