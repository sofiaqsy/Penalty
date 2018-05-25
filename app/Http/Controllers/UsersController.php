<?php

namespace App\Http\Controllers;
use  App\User;

class UsersController extends Controller
{

    function index(){
    /*  $user = new User();
      $user->name = 'asas';
      $user->email = 'email';*/
      echo 'useasasasrsss';
      $user = User::all();


      return response()->json([$user],200);
    }


}
