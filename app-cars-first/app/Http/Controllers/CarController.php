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
        return response()->json(Car::all(), 200);
    }

    // Crear un nuevo registro
    public function store(CarRequest $request)
    {
        $car = Car::create($request->validated());
        return response()->json($car, 201);
    }

    // Obtener un registro específico
    public function show($id)
    {
        $car = Car::find($id);

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

        $car->update($request->validated());
        return response()->json($car, 200);
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
