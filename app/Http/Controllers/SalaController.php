<?php

namespace App\Http\Controllers;
use  App\Sala;
use  App\Usuario;
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

        $usuario = usuario::find($request->id_usuario);
        $sala = sala::find($request->id_sala);
        if($sala->limite_participantes <= $sala->cantidad_participantes){
          $sala = $sala->cantidad_participantes + 1;
          if($usuario->monedas > 0){

            Detalle_Sala::create([
              'id_sala' => $request->id_sala,
              'id_usuario' => $request->id_usuario,
              'goles_equipo1' => $request->goles_equipo1,
              'goles_equipo2' => $request->goles_equipo2
            ]);

            $sala=sala::find($request->id_sala);
            $sala->monto_total = $sala->monto_total + $sala->apuesta_base;
            $usuario->monedas = $usuario->monedas - $sala->apuesta_base;
            $sala->save();
            $usuario->save();

          }else{
            return response()->json('Monedas insuficientes',200);
          }

        }else{
          return response()->json('Monedas Integrantes llenos',200);
        }
        return response()->json($sala,200);


      }

      public function ingresarSala(Request $request)
      {
        $usuario = usuario::find($request->id_usuario);
        $sala = sala::find($request->id_sala);
        if($sala->limite_participantes <= $sala->cantidad_participantes){
          $sala = $sala->cantidad_participantes + 1;
          if($usuario->monedas > 0){

            Detalle_Sala::create([
              'id_sala' => $request->id_sala,
              'id_usuario' => $request->id_usuario,
              'goles_equipo1' => $request->goles_equipo1,
              'goles_equipo2' => $request->goles_equipo2
            ]);

            $sala=sala::find($request->id_sala);
            $sala->monto_total = $sala->monto_total + $sala->apuesta_base;
            $usuario->monedas = $usuario->monedas - $sala->apuesta_base;
            $sala->save();
            $usuario->save();

          }else{
            return response()->json('Monedas insuficientes',200);
          }

        }else{
          return response()->json('Monedas Integrantes llenos',200);
        }
        return response()->json($sala,200);

      }

      public function dividirGanancia(Request $request)
      {

        $usuario= DB::table("usuario as a")
        ->join("detalle_sala as d","idusuario","id_usuario")
        ->join("salas as s","s.id","id_sala")
        ->select("idusuario", "a.nombre", "apellidos", "email", "password", "fecha_nacimiento", "pais_idpais", "monedas")
        ->orderby("a.idusuario","desc")->get();
         var_dump($usuario);exit;

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
