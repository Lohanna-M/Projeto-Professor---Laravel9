<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivittiesResponsesController extends Controller
{
    public function index (Request $request)
    {
        return view('activittiesresponses');
    }

    public function create ()
    {
        return view('responses');
    }

}

