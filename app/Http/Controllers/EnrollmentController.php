<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index(){
        return view('firstpage');
    }

    public function dashboard(){
        return view('dashboard');
    }
}
