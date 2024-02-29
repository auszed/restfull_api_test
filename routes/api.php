<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*
En resumen, el código define una ruta protegida por autenticación Sanctum que devuelve el usuario
autenticado cuando se accede a la URL /user mediante una solicitud HTTP GET
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Versionar la API vamos a empezar con la version 1
Route::group(['prefix'=>'v1', 'namespace' => 'App\Http\Controllers'], function(){
    Route::apiResource('customer', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);
});
