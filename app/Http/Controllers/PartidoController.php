<?php


namespace App\Http\Controllers;
use App\Partido;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use DB;


class PartidoController extends Controller
{

    public function index(Request $request)
    {

        $partidos = DB::table('partidos')
                        ->orderByRaw('horario DESC')
                        ->get();

        return response()->json($partidos,200);
    }


}
