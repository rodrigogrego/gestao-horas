<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ContatoController;


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

Route::get('/', [ HomeController::class, 'index' ])->name('home');

Route::get('/auth/{login}/{password}', [ HomeController::class, 'authLogin' ])->name('auth');

Route::get('/contato', [ ContatoController::class, 'index'])->name('contato');
Route::post('/contato', [ ContatoController::class, 'index'])->name('contato');

Route::prefix('app')->group(function(){

    Route::get('/firstpage', [ EnrollmentController::class, 'index'])->name('app.firstpage');

    Route::get('/dashboard', [ EnrollmentController::class, 'dashboard'])->name('app.dashboard');

});

Route::fallback(function() {
    echo 'Pagina não disponível. <a href="'.route('home').'">Acessa aqui a página principal.</a>';
});

