<?php

namespace App\Http\Controllers;
use App\comentario;
use App\Sala;
use App\Usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use DB;
class MesasController extends Controller
{
    public function index(Request $request)
    {
        $mesa = Mesa::all();
        return response()->json([$mesa],200);
    }
    function listarMesa(Request $request)
    {


        $usuario= DB::table("usuario as a")
            ->join("detalle_sala as d","idusuario","id_usuario")
            ->join("salas as s","s.id","id_sala")
            ->select("idusuario", "a.nombre", "apellidos", "email", "password", "fecha_nacimiento", "pais_idpais", "monedas")
            ->where("s.id",$request->id)
            ->orderby("a.idusuario","desc")->get();

        $comentario = DB::table("comentario as c")
            ->join("salas as s","s.id","sala_idsala")
            ->select("idcomentario", "comentario", "usuario_idusuario","sala_idsala")
            ->where("s.id",$request->id)
            ->orderby("idcomentario","desc")->get();

        $sala = Sala::where('id',$request->id)->first();

        return response()->json(["usuario"=>$usuario,"comentario"=>$comentario],200);//,"sala"=>$sala

    }
    public function dividirGanancia(Request $request)
    {
      $data = $request->json()->all();
      $usuario= DB::table("usuario as a")
              ->join("detalle_sala as d","idusuario","id_usuario")
              ->join("salas as s","s.id","id_sala")
              ->select("a.idusuario", "a.nombre", "a.apellidos", "a.email", "a.password", "a.fecha_nacimiento", "a.pais_idpais", "a.monedas")
              ->where("s.id","=",$data['id'])
              ->orderby("a.idusuario","desc")->get();

       var_dump($usuario->idusuario);exit;

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
}
