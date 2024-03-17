<?php

namespace App\Http\Controllers;

use App\calificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $calificacions = DB::table('calificacions')->where('materiaId', $id)->get();
        return view('calificacion.index', compact('calificacions', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('calificacion.create', compact('id')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'actividad' => 'required|max:75',
            'tipo' => 'required|max:75',
            'calificacion' => 'required|max:3',
            'materiaId' => 'required',
        ]);
        Calificacion::create($validatedData);
        return redirect()->action('CalificacionController@index', [$request->materiaId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calificacion = Calificacion::findOrFail($id); 

        return view('calificacion.show', compact('calificacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calificacion = Calificacion::findOrFail($id); 
        return view('calificacion.edit', compact('calificacion')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'actividad' => 'required|max:75',
            'tipo' => 'required|max:75',
            'calificacion' => 'required|max:3',
            'materiaId' => 'required',
        ]);
        Calificacion::whereId($id)->update($validatedData); 
        return redirect()->action('CalificacionController@index', [$request->materiaId])->with('success', 'La calificación se ha actualizado'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calificacion = Calificacion::findOrFail($id); 
        $materia = $calificacion->materiaId;
        $calificacion->delete(); 
        return redirect()->action('CalificacionController@index', [$materia])->with('success', 'La calificación se ha borrado'); 

    }
}
