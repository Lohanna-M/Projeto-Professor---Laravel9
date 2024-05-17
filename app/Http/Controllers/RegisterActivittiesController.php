<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterActivittiesController extends Controller
{
    public function index (Request $request)
    {
        return view('RegisterActivitties');
    }
}
