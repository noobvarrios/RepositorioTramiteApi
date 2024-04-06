<?php

namespace App\Http\Controllers;

use App\Models\Tramite;
use Illuminate\Http\Request;

class TramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tramites = Tramite::all(); 
        return response()->json($tramites); 
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Tramite $tramite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tramite $tramite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tramite $tramite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tramite $tramite)
    {
        //
    }
}
