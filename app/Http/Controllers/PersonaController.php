<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Persona::all(); 
        return response()->json($personas); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $persona = new Persona; 
        $persona->nombre = $request->nombre; 
        $persona->correo = $request->correo; 
        $persona->telefono = $request->telefono; 
        $persona->direccion = $request->direccion; 
        $persona->save(); 
        $data = [
            'message' => 'La persona se agrego exitosamente. ', 
            'persona' => $persona
        ]; 
        return response()->json($data); 
    }

    public function show($personaid)
    {
        $persona = Persona::find($personaid);
        if (!$persona) {
            return response()->json(['error' => 'No se encontró la persona'], 404);
        }

        return response()->json($persona);
    }


    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $personaid)
    {
        $persona = Persona::findOrFail($personaid);
    
        $persona->nombre = $request->nombre;
        $persona->correo = $request->correo;
        $persona->telefono = $request->telefono;
        $persona->direccion = $request->direccion;
        $persona->save();
    
        $data = [
            'message' => 'La persona se actualizó exitosamente.',
            'persona' => $persona
        ];
    
        return response()->json($data);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($personaid)
    {
        $persona = Persona::find($personaid);
        if (!$persona) {
            return response()->json(['error' => 'No se encontró la persona'], 404);
        }
        else{
            $persona->delete();
            $data = [
                'message' => 'La persona se borró exitosamente.',
                'persona' => $persona
            ];
            return response()->json($data);
        }
    }
    
}
