<?php

namespace App\Http\Controllers;
use  App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    function index(Request $request)
    {
        $user = User::all();
        return response()->json([$user],200);
    }

    function createaUser(Request $request)
    {
      if($request->isJson()){

        return response()->json([$user],200);
      }
     return response()->json(['error' => 'no autorizado'], 401, []);
    }


}
