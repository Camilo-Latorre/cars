<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Incluye los registros relacionados de la tabla Cars
        $categorias = Categoria::with('cars')->get();

        return response()->json([
            'message' => 'Categorías retrieved successfully',
            'data' => $categorias
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'required|boolean',
            'prioridad' => 'required|integer|min:1',
        ]);

        // Crear la categoría
        $categoria = Categoria::create($validatedData);

        return response()->json([
            'message' => 'Categoría created successfully',
            'data' => $categoria
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Buscar la categoría por su ID e incluir los registros de Cars relacionados
        $categoria = Categoria::with('cars')->find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría not found'], 404);
        }

        return response()->json([
            'message' => 'Categoría retrieved successfully',
            'data' => $categoria
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Buscar la categoría por su ID
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría not found'], 404);
        }

        // Validar los datos de entrada
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'required|boolean',
            'prioridad' => 'required|integer|min:1',
        ]);

        // Actualizar la categoría
        $categoria->update($validatedData);

        return response()->json([
            'message' => 'Categoría updated successfully',
            'data' => $categoria
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar la categoría por su ID
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría not found'], 404);
        }

        // Eliminar la categoría
        $categoria->delete();

        return response()->json([
            'message' => 'Categoría deleted successfully'
        ], 200);
    }

    /**
     * Método adicional: Listar categorías activas y sus registros relacionados.
     */
    public function activasConRegistros()
    {
        // Obtener categorías con estado true y los registros relacionados de Cars
        $categorias = Categoria::where('estado', true)->with('cars')->get();

        return response()->json([
            'message' => 'Active Categorías retrieved successfully',
            'data' => $categorias
        ], 200);
    }
}
