<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ContatoController;
use App\Http\Middleware\LogAcessosMiddleware;
use App\Http\Middleware\AutenticacaoMiddleware;
use App\Http\Controllers\HomeController;



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

Route::get('/{error?}', [ LoginController::class, 'index' ])->name('login');

Route::post('/', [ LoginController::class, 'authenticate' ])->name('auth');

Route::get('/contato', [ ContatoController::class, 'index'])->name('contato');
Route::post('/contato', [ ContatoController::class, 'store'])->name('contato');

Route::middleware('autenticacao')->prefix('app')->group(function(){

    Route::get('/home', [ HomeController::class, 'index' ])->name('app.home');

    Route::get('/logout', [ LoginController::class, 'logout'])->name('app.logout');

    Route::get('/firstpage', [ EnrollmentController::class, 'index'])->name('app.firstpage');

    Route::get('/dashboard', [ EnrollmentController::class, 'dashboard'])->name('app.dashboard');

});

Route::fallback(function(){
    echo 'Pagina não disponível. <a href="'.route('login').'">Acessa aqui a página principal.</a>';
});

