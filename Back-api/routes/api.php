<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\empleadosController;

Route::get("/empleados", [empleadosController::class, 'index']);

Route::get("/empleados/{id}", [empleadosController::class, 'show']);

Route::post("/empleados", [empleadosController::class, 'store']);

Route::put("/empleados/{id}", [empleadosController::class, 'update']);

Route::delete("/empleados/{id}", [empleadosController::class, 'destroy']);