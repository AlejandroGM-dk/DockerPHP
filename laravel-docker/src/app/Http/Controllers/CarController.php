<?php

namespace App\Http\Controllers;
use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class CarController extends Controller
{
    /**
     * @group Coches
     * @authenticated
     */
    public function añadirCoche(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'autonomia' => 'required|string',
        ]);

        Cars::create($validated);

        return response()->json([
            'message' => "{$validated['marca']} {$validated['modelo']} añadido correctamente",
        ]);
    }

    /**
     * @group Coches
     * @authenticated
     */
    public function modificarCoche(Request $request, $id): JsonResponse
    {
        $coche = Cars::findOrFail($id);
        $coche->update($request->only(['marca','modelo','autonomia']));

        return response()->json([
            'message' => "Coche modificado correctamente",
            'coche' => $coche,
        ]);
    }

    /**
     * @group Coches
     * @authenticated
     */
    public function mostrarCoches(): JsonResponse
    {
        return response()->json(Cars::all());
    }
}



