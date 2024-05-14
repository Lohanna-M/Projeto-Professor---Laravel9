<?php

use App\Http\Controllers\ActivittiesController;
use App\Http\Controllers\AuthController;
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

Route::controller(AuthController::class)->group(function (){
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerSave')->name('register.save');

    Route::get('/','login', 'login')->name('login');
    Route::post('/', 'login', 'login.Action')->name('login.action');
});

Route::get('/activitties',[ActivittiesController::class, 'index'])->name('Activitties');


