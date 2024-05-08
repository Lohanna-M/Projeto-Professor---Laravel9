<?php

use App\Http\Controllers\ActivittiesController;
use App\Http\Controllers\ActivityResponseController;
use App\Http\Controllers\HomeController;
use App\Models\Activitties;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('Home');
Route::get('/activitties',[ActivittiesController::class, 'index'])->name('Activitties');


