<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Tramite;
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
        $persona = Persona::find($personaid);
        
        if (!$persona) {
            return response()->json(['message' => 'No se encontró la persona'], 404);
        }

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

   

    public function agregarServicio(Request $request)
    {
        $persona = Persona::find($request->personaid); 
        
        if (!$persona) {
            return response()->json(['error' => 'No se encontró la persona'], 404);
        }

        $tramite = Tramite::find($request->tramiteid);

        if (!$tramite) {
            return response()->json(['error' => 'No se encontró el trámite'], 404);
        }

        $persona->tramites()->attach($tramite->id); 

        $data = [
            'message' => 'Relacionado Correctamente.', 
            'persona' => $persona,
            'tramite' => $tramite
        ]; 

        return response()->json($data); 
    }
}
