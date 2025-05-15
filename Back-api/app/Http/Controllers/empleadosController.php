<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadosController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all(); 

        if ($empleados->isEmpty()) {
            $data = [
                'message' => 'No se encontraron empleados',
                'status' => 200
            ];
            return response()->json($data, 404);
        }

        return response()->json($empleados, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'Nombre' => 'required',
           'Apellido_p' => 'required',
           'Apellido_m' => 'required',
           'telefono' => 'required',
           'puesto' => 'required',
           'empresa' => 'required', 
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'stattus' => 400
            ];
            return response()->json($data, 400);
        }

        $empleado = Empleado::create([
            'Nombre' => $request->nombre,
            'Apellido_p' => $request->apellido_p,
           'Apellido_m' => $request->apellido_m,
           'telefono' => $request->telefono,
           'puesto' => $request->puesto,
           'empresa' => $request->empresa, 
        ]);
        if (!$empleado) {
            $data = [
                'message' => 'Error al crear el empleado',
                'errors' => $validator->errors(),
                'stattus' => 400
            ];
            return response()->json($data, 400);
        }

        
    }
}


