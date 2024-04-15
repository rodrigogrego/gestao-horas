<?php

namespace App\Http\Controllers;

use App\Models\TarefaModel;
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
        return 'TESTE';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TarefaModel $tarefaModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TarefaModel $tarefaModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TarefaModel $tarefaModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TarefaModel $tarefaModel)
    {
        //
    }
}
