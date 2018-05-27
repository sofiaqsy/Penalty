<?php

namespace App\Http\Controllers;
use  App\Sala;
use  App\Detalle_Sala;
use Illuminate\Http\Request;

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

      public function showSalas($partidoId)
      {
        exit;
        var_dump($salaId);
          return response()->json(['response'=> 'Sala creada'],200);
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
          ]);

          return response()->json(['response'=> 'Sala creada'],200);
      }



      public function update(Request $request, $salaId)
      {

          $sala=Sala::find($salaId);
          $sala->update($request->all());
          return response()->json($sala,200);

      }

      public function salirDeSala(Request $request)
      {

      exit;


          return response()->json($sala,200);

      }


      public function destroy($id)
      {
        exit;
          $sala=Sala::find($id);
echo $id;
          exit;
          if(Auth::user()->id !== $sala->user_id) {
              return response()->json(['status'=>'error','message'=>'unauthorized'],401);
          }
          if (sala::destroy($id)) {
              return response()->json(['status' => 'success', 'message' => 'sala Deleted Successfully']);
          }
          return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
      }

}
