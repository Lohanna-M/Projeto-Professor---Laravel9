<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityResponseController extends Controller
{
  public function index()
  {
    $activitties = ::get();
  }

}
