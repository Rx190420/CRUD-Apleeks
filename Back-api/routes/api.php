<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\empleadosController;

Route::get("/empleados", [empleadosController::class, 'index']);

Route::post("/empleados", [studenController::class, 'store']);

Route::put("/empleados/{id}", function () {
    return "Editando empleados";
});

Route::delete("/empleados/{id}", function () {
    return "Elimando empleados";
});