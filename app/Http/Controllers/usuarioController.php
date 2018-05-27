<?php

namespace App\Http\Controllers;
use App\Usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class usuarioController extends Controller
{

    function index()
    {

        $user = Usuario::all();
        return response()->json($user,200);
    }

    function CreateUsuario(Request $request)
    {

            $data = $request->json()->all();
            $usuario = usuario::create([
                'nombre' => $data['nombre'],
                'apellidos' => $data['apellidos'],
                'email' => $data['email'],
                'password' => $data['password'],
                'fecha_nacimiento' => $data['fecha_nacimiento'],
                'pais_idpais' => $data['pais_idpais'],
                'monedas' => $data['monedas']

            ]);
            return response()->json($usuario,200);
    }

    function Login(Request $request){
        $data = $request->json()->all();
        try{
            $usuario =Usuario::where('email',$data['email'])->first();
            $pass =Usuario::where('password',$data['password'])->first();
            if($usuario && $pass ){
                return response()->json($usuario,200);
            }
            return response()->json(['error'=>'datos incorrecto'],406);
        }catch (ModelNotFoundException $e){
            return response()->json(['error'=>'error en datos'],406);
        }

    }


}
