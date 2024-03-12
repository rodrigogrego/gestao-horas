<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $users = 
        [
            0 => ['name' => 'Rodrigo', 'status' => 0, 'ddd' => 71, 'telefone' => '0000-0000'],
            1 => ['name' => 'Amanda', 'status'=> 1, 'ddd' => 75, 'telefone' => '0000-0000'],
            2 => ['name'=> 'Thiago', 'status' => 0, 'ddd' => 11, 'telefone' => '0000-0000'] 

        ];

        // $users = [];

        return view('public.home', compact('users'));
    }

    public function authLogin(){
        return view('app.firstPage'); 
        // return view('app.firstPage')->with('email', 'senha');
    }
}
