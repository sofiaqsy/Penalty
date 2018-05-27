<?php

namespace App\Http\Controllers;
use  App\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{

    public function index(Request $request)
    {
        $noticias = Noticia::all();
        return response()->json([$noticias],200);
    }

}
