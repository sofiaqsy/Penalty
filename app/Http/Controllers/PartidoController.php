<?php


namespace App\Http\Controllers;
use App\Partido;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PartidoController extends Controller
{

    public function index(Request $request)
    {
        $partidos = Partido::all();
        return response()->json($partidos,200);
    }


}
