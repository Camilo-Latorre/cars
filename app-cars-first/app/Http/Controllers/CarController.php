<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Obtener todos los registros
    public function index()
    {
        // Incluimos la relación con Categoría
        $cars = Car::with('categoria')->get();
        return response()->json($cars, 200);
    }

    // Crear un nuevo registro
    public function store(CarRequest $request)
    {
        // Creamos el carro con los datos validados
        $car = Car::create($request->validated());
        return response()->json([
            'message' => 'Car created successfully',
            'data' => $car
        ], 201);
    }

    // Obtener un registro específico
    public function show($id)
    {
        // Incluimos la categoría relacionada
        $car = Car::with('categoria')->find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        return response()->json($car, 200);
    }

    // Actualizar un registro existente
    public function update(CarRequest $request, $id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        // Actualizamos el carro con los datos validados
        $car->update($request->validated());
        return response()->json([
            'message' => 'Car updated successfully',
            'data' => $car
        ], 200);
    }

    // Eliminar un registro
    public function destroy($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $car->delete();
        return response()->json(['message' => 'Car deleted successfully'], 200);
    }
}
