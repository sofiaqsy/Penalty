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
}
