<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Router;

Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/mensaje', function () {
    return response()->json([
    'message' => 'Hola, este es un mensaje protegido por autenticación.'
    ]);
})->middleware('auth:sanctum');



Route::get('/json', function () {
    return response()->json([
        'message' => 'Hola, este es un mensaje en formato JSON.'
    ]);
})->middleware('auth:sanctum');


//Ruta añadir coches

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/añadirCoche', [CarController::class, 'añadirCoche']);
    Route::put('/modificarCoche/{id}', [CarController::class, 'modificarCoche']);
    Route::get('/mostrarCoches', [CarController::class, 'mostrarCoches']);});




Route::middleware('auth:sanctum')->group(function () 
{
    
    Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
   
});