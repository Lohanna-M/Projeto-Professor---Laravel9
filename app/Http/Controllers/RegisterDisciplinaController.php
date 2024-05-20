<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterDisciplinaController extends Controller
{
    public function index ()
    {
        return view('registers.registerdisciplina');
    }
}
