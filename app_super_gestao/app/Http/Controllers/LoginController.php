<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {

        $erro = '';

        if($request -> get('erro') == 1)
        {
            $erro = "Usuário e/ou senha são inválidos.";
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'usuario'   => 'required | email',
            'senha'     => 'required | min: 8'
        ];

        $feedback = [
            'required'  => 'Este campo é obrigatório.',
            'email'     => 'Email informado inválido',
            'min'       => 'A senha ter no mínimo 8 caracteres.'
        ];

        $request -> validate($regras, $feedback);


        $email = $request -> get('usuario');
        $password = $request -> get('senha');

        $user = new User();

        $usuario = $user   -> where('email', $email)
                           -> where('password', $password)
                           ->get()
                           ->first();

        if(isset($usuario -> name))
        {
            session_start();
            $_SESSION['nome'] = $usuario -> name;

            return redirect() -> route('app.clientes');
        }
        else
        {
            return redirect() -> route('site.login', ['erro' => 1]);
        }
    }
}
