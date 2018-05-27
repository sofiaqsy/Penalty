<?php

namespace App\Http\Controllers;
use App\comentario;
use App\Usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class comentarioController extends Controller
{

    function index()
    {

        $comentario = comentario::all();
        return response()->json($comentario,200);
    }

    function CreateComentario(Request $request)
    {

            $data = $request->json()->all();
            $comentario = comentario::create([
                'comentario' => $data['comentario'],
                'usuario_idusuario' => $data['usuario_idusuario'],
                'sala_idsala' => $data['sala_idsala']
            ]);
            $comentario = comentario::all();
            return response()->json($comentario,200);
    }


}
