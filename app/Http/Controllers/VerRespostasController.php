<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerRespostasController extends Controller
{
    public function index ()
    {
        return view('responses');
    }
}
