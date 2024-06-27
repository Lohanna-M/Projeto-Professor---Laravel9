<?php

namespace App\Http\Controllers;

use App\Models\Activitties;
use Illuminate\Http\Request;

class ActivittiesResponsesController extends Controller
{
    public function index (Request $request)
    {
        $activitties  = Activitties::get();
        return view('activittiesresponses', compact('activitties'));
    }

    public function show($id)
    {
        $activity = Activitties::where('id', $id)->first();
        return view('responsesshow', compact('activity'));
    }

}

