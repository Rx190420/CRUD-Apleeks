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
            return response()->json([
                'message' => 'No se encontraron empleados',
                'status' => 200
            ], 200);
        }

        return response()->json([
            $empleados,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido_p' => 'required|string|max:255',
            'apellido_m' => 'required|string|max:255',
            'telefono' => 'required|string|max:10',
            'puesto' => 'required|string|max:255',
            'empresa' => 'required|string|max:255', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        $empleado = Empleado::create($request->all());

        if (!$empleado) {
            return response()->json([
                'message' => 'Error al crear el empleado',
                'status' => 500
            ], 500);
        }

        return response()->json([
            'empleado' => $empleado,
            'status' => 201
        ], 201);
    }

    public function show($id) 
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json([
                'message' => 'Empleado no encontrado',
                'status' => 404
            ], 404);
        }

        return response()->json([
            'empleado' => $empleado,
            'status' => 200
        ], 200);
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json([
                'message' => 'Empleado no encontrado',
                'status' => 404
            ], 404);
        }

        $empleado->delete();

        return response()->json([
            'message' => 'Empleado eliminado',
            'status' => 200
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json([
                'message' => 'Empleado no encontrado',
                'status' => 404
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido_p' => 'required|string|max:255',
            'apellido_m' => 'required|string|max:255',
            'telefono' => 'required|string|max:10',
            'puesto' => 'required|string|max:255',
            'empresa' => 'required|string|max:255', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ], 400);
        }

        $empleado->update($request->all());

        return response()->json([
            'message' => 'Empleado actualizado',
            'empleado' => $empleado,
            'status' => 200
        ], 200);
    }
}




