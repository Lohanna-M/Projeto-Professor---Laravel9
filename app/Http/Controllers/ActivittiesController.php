<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivittiesController extends Controller
{
    public function index (Request $request)
    {
        return view('activitties');
    }
}
