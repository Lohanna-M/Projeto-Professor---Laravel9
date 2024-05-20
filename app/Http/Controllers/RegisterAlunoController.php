<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterAlunoController extends Controller
{
    public function index ()
    {
        return view('registers.registeraluno');
    }
}
