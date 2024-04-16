<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MensagemTesteMail;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function(){
    return view('welcome');
});


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
                    ->name('home')
                    ->middleware('verified');

Route::resource('tarefas', 'App\Http\Controllers\TarefaController')
->middleware('verified');

Route::get('/mensagem-teste', function(){
    return new MensagemTesteMail();
});
