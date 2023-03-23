<?php

use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('logout',[LoginController::class, 'logout']);

//Clientes
Route::get('/clients',[ClientController::class, 'index']);
Route::get('/clients/{client}',[ClientController::class, 'show']);
Route::post('/clients',[ClientController::class, 'store']);
Route::put('/clients/{client}',[ClientController::class, 'update']);
Route::delete('/clients/{client}',[ClientController::class, 'destroy']);

//Usuarios
Route::get('/users',[UserController::class, 'index']);
Route::get('/users/{user}',[UserController::class, 'show']);
Route::post('/users',[UserController::class, 'store']);
Route::put('/users/{user}',[UserController::class, 'update']);
Route::delete('/users/{user}',[UserController::class, 'destroy']);

//Bikes
Route::get('/bikes',[BikeController::class, 'index']);
Route::get('/bikes/{bike}',[BikeController::class, 'show']);
Route::post('/bikes',[BikeController::class, 'store']);
Route::put('/bikes/{bike}',[BikeController::class, 'update']);
Route::delete('/bikes/{bike}',[BikeController::class, 'destroy']);