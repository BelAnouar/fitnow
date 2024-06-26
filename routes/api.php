<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Progresscontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/login', [AuthController::class, 'login'])->name("login");
Route::post('/signup', [AuthController::class, 'createUser']);
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum');

Route::apiResource("/events", Progresscontroller::class)->middleware('auth:sanctum');
Route::patch("/event/{id}", [Progresscontroller::class, "updateStatus"])->middleware('auth:sanctum');
