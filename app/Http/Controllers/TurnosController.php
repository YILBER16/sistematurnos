<?php

namespace App\Http\Controllers;

use App\Models\Turnos;
use App\Models\Usuarios;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TurnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('turnos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario=Usuarios::where('id_documento',$request->id_usuario)->get()->last();
        if(!$usuario){
            return response()->json("No existe");
        }
        // dd($usuario);
        if($usuario->edad>=62){
            $data= new Turnos();
            $data->id_usuario = $request->id_usuario;
            $data->tipo_turno = "Preferencial";
            $data->estado = "Asignado";
            $data->save();
        }
        if($usuario->edad<=62){
            $data= new Turnos();
            $data->id_usuario = $request->id_usuario;
            $data->tipo_turno = $request->tipo_turno;
            $data->estado = "Asignado";
            $data->save();
        }
        $ultimoturno=Turnos::where('estado',"Asignado")->get()->last();
        return response()->json($ultimoturno);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function show(Turnos $turnos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function edit(Turnos $turnos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turnos $turnos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turnos  $turnos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turnos $turnos)
    {
        //
    }
    public function validacion(Request $request)
    {
       dd($request->all());
    }
}
