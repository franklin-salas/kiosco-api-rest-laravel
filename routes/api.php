<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*
php artisan  make:resource ProductoCollection
php artisan  make:resource ProductoResource
php artisan  make:model Producto --resource --api --migration
php artisan migrate:refresh --seed
*/

Route::middleware('auth:sanctum')->group(function(){

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/pedido',[PedidoController::class,'store']);


});

Route::apiResource('/categorias',CategoriaController::class);
Route::apiResource('/productos',ProductoController::class);
Route::post('/registro', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);