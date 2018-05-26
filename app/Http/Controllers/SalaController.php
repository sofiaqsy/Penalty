<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SalaController extends Controller
{

  function list(Request $request)
  {
    
      return response()->json([$user],200);
  }

    public function sala(Request $request)
    {

        return response()->json(['status' => 'success', 'user' => 'oi'], 200);
    }

    public function register(Request $request)
    {
        $user = User::create([
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => app('hash')->make($request->password),
            'api_token' => str_random(50),
        ]);
        return response()->json(['status' => 'success', 'user' => $user], 200);
    }




}
