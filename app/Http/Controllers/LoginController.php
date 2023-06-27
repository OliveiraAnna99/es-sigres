<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(){
    $this->middleware('auth');
    }
    public function logar(){
        return view('auth.login');
    }
}
