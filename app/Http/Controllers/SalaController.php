<?php

namespace App\Http\Controllers;
use  App\Sala;
use  App\Detalle_Sala;
use Illuminate\Http\Request;
use DB;

class SalaController extends Controller
{

    public function index(Request $request)
    {
        $sala = Sala::all();
        return response()->json([$sala],200);
    }

      public function show($salaId)
      {
          $sala = Sala::findOrFail($salaId);
          return response()->json(['sala'=> $sala],200);
      }


      public function store(Request $request)
      {
          $this->validate($request,['nombre'=>'required']);

          Sala::create([
            'nombre' => $request->nombre,
            'cantidad_participantes' => $request->cantidad_participantes,
            'monto_total' => $request->monto_total,
            'tipo' => $request->tipo,
            'limite_participantes' => $request->limite_participantes,
            'apuesta_base' => $request->apuesta_base,
            'id_partido' => $request->id_partido,
          ]);

          Detalle_Sala::create([
            'id_sala' => $request->id_sala,
            'id_usuario' => $request->id_usuario,
            'goles_equipo1' => $request->goles_equipo1,
            'goles_equipo2' => $request->goles_equipo2
          ]);

          return response()->json(['response'=> 'Sala creada'],200);
      }



      public function updateSala(Request $request, $salaId)
      {

          $sala=Sala::find($salaId);
          $sala->update($request->all());
          return response()->json($sala,200);

      }

      public function salirDeSala(Request $request)
      {
        exit;
        var_dump($request->id_sala);exit;
          $id = Sala::where('id_sala', $request->id_sala);
                    exit;


          var_dump($id);exit;


          return response()->json($sala,200);

      }

      public function ingresarSala(Request $request)
      {

        Detalle_Sala::create([
          'id_sala' => $request->id_sala,
          'id_usuario' => $request->id_usuario,
          'goles_equipo1' => $request->goles_equipo1,
          'goles_equipo2' => $request->goles_equipo2
        ]);

        $sala=Sala::find($request->id_sala);
        $sala->monto_total = $sala->monto_total + $sala->apuesta_base;

        $usuario = Usuario::find($request->id_usuario);
        $usuario->monedas = $usuario->monedas - $sala->apuesta_base;

        $sala->save();
        $usuario->save();

        return response()->json($sala,200);

      }



      public function destroy($id)
      {

        sala::destroy($id);
        
      }

}
