<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function index(Request $request){

        $motivo_contatos = MotivoContato::all();

        return view('public.contato', compact('motivo_contatos'));
    }

    public function store(Request $request){

        //contato::create($request->all());

        $request->validate([
            'nome' => 'required|min:3|max:40',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required'
        ]);



       
    }
}
