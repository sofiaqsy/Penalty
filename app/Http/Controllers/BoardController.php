<?php

namespace App\Http\Controllers;
use  App\Board;
use Illuminate\Http\Request;

use Laravel\Lumen\Routing\Controller as BaseController;

class BoardController extends BaseController
{

public function index() {
  return Board::all();
}

public function store(){
  Board::create([
    'nombre' => 'asa',
    'nombre2' => 'asas',

  ]);
}

public function show($salaId)
{
    $sala = Board::findOrFail($salaId);
    return response()->json(['sala'=> $sala],200);
}

}
