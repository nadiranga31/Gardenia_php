<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('users',ApiController::class);
Route::get('/getusers/{id}', [ApiController::class, 'get_all_user']);
Route::post('/create_user', [ApiController::class, 'create_user']);
Route::put('/update_user/{id}', [ApiController::class, 'update_user']);
Route::delete('/delete_user/{id}', [ApiController::class, 'delete_user']);


Route::get('/getfood', [ApiController::class, 'get_all_food']);
Route::post('/create_food', [ApiController::class, 'create_food']);
Route::put('/update_food/{id}', [ApiController::class, 'update_food']);
Route::delete('/delete_food/{id}', [ApiController::class, 'delete_food']);



Route::apiResource('orders',OrderController::class);
Route::get('/orders/{id}', [OrderController::class, 'show']);
Route::post('/orders/store', [OrderController::class, 'store']);
Route::put('/orders/{id}', [OrderController::class, 'update']);
Route::delete('/orders/{id}', [OrderController::class, 'destroy']);
