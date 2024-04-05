<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index(){

        $login = $_SESSION['email'];
        $name = $_SESSION['name'];

        return view('app.firstpage', compact('login', 'name'));
    }

    public function dashboard(){
        return view('app.dashboard');
    }
}
