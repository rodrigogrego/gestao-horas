<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){ 

        $erro = $request->get('erro');

        $erro == 1 ? $erro = 'Usuário e senha não encontrados' : '';

        $erro == 2 ? $erro = 'Sem permissão para acesso a rota' : '';

        return view('public.login', ['erro' => $erro ]);
    }

    public function authenticate(Request $request){
        
        //regras autenticação
        $regras = [
            'login' => 'email',
            'password' => 'required'
        ];


        //feedback
        $feedback = [
            'login.email' => 'Insira um (email) válido',
            'password.required' =>'A senha precisa ser preenchida'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('login');
        $password = $request->get('password');

        $user = new User();

        $user_login = $user->where('email', $email)
                        ->where('password', $password)
                        ->get()->first();
        
       if(isset($user_login->name)){
            session_start();

            $_SESSION['name'] = $user_login->name;
            $_SESSION['email'] = $user_login->email;

            return redirect()->route('app.home');

       }else{
            return redirect()->route('login', ['erro' => 1]);
       }
    }

    public function logout(){
        session_destroy();

        return redirect()->route('login');
    }
}
