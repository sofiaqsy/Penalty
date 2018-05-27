<?php

namespace App\Http\Controllers;
use App\Comentario;
use App\Usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{

    function index()
    {

        $comentario = Comentario::all();
        return response()->json($comentario,200);
    }

    function CreateComentario(Request $request)
    {

        $comentario = Comentario::create([
            'comentario' => $request->comentario,
            'usuario_idusuario' => $request->usuario_idusuario,
            'sala_idsala' => $request->sala_idsala
        ]);
        $comentario = Comentario::all();
        return response()->json($comentario,200);
    }


}
