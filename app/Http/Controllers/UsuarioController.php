<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UsuarioController extends Controller
{
    function login(Request $request){

      $usuario =  Usuario::where('usuario','=',$request->usuario)->first();


      if ($usuario != null){
          if (Hash::check($request->senha,$usuario->senha)){
              Auth::loginUsingId($usuario->id);
              return redirect()->intended('home');
          }
      }
          return redirect()->intended('login');
    }
}
