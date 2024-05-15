<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RespostasController extends Controller
{
    public function index (Request $request)
    {
        return view('Respostas');
    }
}
