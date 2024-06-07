<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */

    public function __construct(){
        
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $user_id = auth()->user()->id;
        $tarefas = Tarefa::where('user_id', $user_id)->paginate(5);
        return view('tarefas.index', ['tarefas' => $tarefas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarefas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tarefa' => 'required',
            'data_limite_conclusao' => 'required'
        ]);

        $dados = $request->all('tarefa', 'data_limite_conclusao');

        $dados['user_id'] = auth()->user()->id;

        $tarefa = Tarefa::create($dados);

        $destinatario = auth()->user()->email;
        Mail::to($destinatario)->send(new NovaTarefaMail($tarefa));

        return redirect()->route('tarefas.show', ['tarefa' => $tarefa->id]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
   {

        return view('tarefas.show', ['tarefa' => $tarefa]);
 
            
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
   {
        $user_id = auth()->user()->id;

        if($tarefa->user_id == $user_id){
            return view('tarefas.edit', ['tarefa' => $tarefa]);
        }
        return view('acesso-negado');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
   {
        // $request->validate([
        //     'tarefa' => 'required',
        //     'data_limite_conclusao' => 'required'
        // ]);

        //atualizado para
        //print_r($request->all());
        $tarefa->update($request->all());

        return redirect()->route('tarefas.index');
        //era assim
        //print_r($tarefa->getAttributes());

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        //
    }
}