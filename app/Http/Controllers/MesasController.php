<?php

namespace App\Http\Controllers;
use App\Usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    function ListarMsa(Request $request)
    {

        $user = Usuario::all();
        return response()->json($user,200);

    }
}
