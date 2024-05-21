<?php

use App\Http\Controllers\ActivittiesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterActivittiesController;
use App\Http\Controllers\RegisterAlunoController;
use App\Http\Controllers\RegisterDisciplinaController;
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
Route::get('/registeractivitties',[ActivittiesController::class, 'create'])->name('RegisterActivitties');
Route::post('/registeractivitties/store', [ActivittiesController::class, 'store'])->name('StoreActivitties');
Route::post('/registeractivitties/show', [ActivittiesController::class, 'show'])->name('ShowActivitties');

Route::get('/disciplina',[ActivittiesController::class, 'index'])->name('Disciplina');

Route::get('/registerdisciplina',[RegisterDisciplinaController::class, 'index'])->name('RegisterDisciplina');

Route::get('/aluno',[ActivittiesController::class, 'index'])->name('Aluno');

Route::get('/registeraluno',[RegisterAlunoController::class, 'index'])->name('RegisterAluno');




