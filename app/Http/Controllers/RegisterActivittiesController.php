<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterActivittiesController extends Controller
{
    public function index ()
    {
        return view('registers.registeractivitties');
    }
}
