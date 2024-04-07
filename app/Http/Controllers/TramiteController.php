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
        $tramite = new Tramite(); 
        $tramite->nombre = $request->nombre; 
        $tramite->descripcion = $request->descripcion; 
        $tramite->precio = $request->precio; 
        $tramite->estado =  $request->estado; 
        $tramite->fecha_inicio = $request->fecha_inicio; 
        $tramite->fecha_fin = $request->fecha_fin; 
        $tramite->save(); 
        $data = [
            'message' => 'Tramite Añadido Correctamente',
            'Tramite' => $tramite 
        ]; 

        return response()->json($tramite); 
    
    }

    /**
     * Display the specified resource.
     */
    public function show($tramiteid)
    {
        $tramite = Tramite::find($tramiteid);
        if (!$tramite) {
            return response()->json(['error' => 'No se encontró el Tramite'], 404);
        }

        return response()->json($tramite);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tramite $tramite)
    {

    }

    public function update(Request $request, $tramiteid)
    {
        $tramite = Tramite::find($tramiteid);
        
        if (!$tramite) {
            return response()->json(['message' => 'No se encontró el trámite'], 404);
        }
    
        $tramite->nombre = $request->nombre; 
        $tramite->descripcion = $request->descripcion; 
        $tramite->precio = $request->precio; 
        $tramite->estado =  $request->estado; 
        $tramite->fecha_inicio = $request->fecha_inicio; 
        $tramite->fecha_fin = $request->fecha_fin; 
        $tramite->save(); 
    
        $data = [
            'message' => 'Trámite se actualizó correctamente',
            'tramite' => $tramite 
        ]; 
    
        return response()->json($data); 
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tramiteid)
    {
        $tramite = Tramite::find($tramiteid);
        if (!$tramite) {
            return response()->json(['error' => 'No se encontró el tramite'], 404);
        }
        else{
            $tramite->delete();
            $data = [
                'message' => 'El tramite se borró exitosamente.',
                'tramite' => $tramite
            ];
            return response()->json($data);
        }
    }
}
