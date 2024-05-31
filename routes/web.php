<?php

use App\Http\Controllers\ActivittiesController;
use App\Http\Controllers\ActivittiesResponsesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\RegisterActivittiesController;
use App\Http\Controllers\RegisterAlunoController;
use App\Http\Controllers\RegisterDisciplinaController;
use App\Http\Middleware\AdminAccess;
use App\Models\ActivittiesResponses;
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

Route::controller(AuthController::class)->group(function()
    {
        Route::get('/register')->name('register')->middleware('professor', 'admin');
        Route::post('/registerSave')->name('register.save')->middleware('professor', 'admin');

        Route::get('/','login', '/login',)->name('login')->middleware('professor', 'admin', 'aluno');
        Route::post('/', 'login', '/login.Action',)->name('login.action')->middleware('professor', 'admin', 'aluno');
    });

Route::get('/activitties',[ActivittiesController::class, 'index'])->name('Activitties')->middleware('professor', 'admin', 'aluno');
Route::get('/registeractivitties',[ActivittiesController::class, 'create'])->name('RegisterActivitties');
Route::post('/registeractivitties/store', [ActivittiesController::class, 'store'])->name('StoreActivitties');
Route::post('/registeractivitties/show', [ActivittiesController::class, 'show'])->name('ShowActivitties');

Route::get('/activittiesresponses',[ActivittiesResponsesController::class, 'index'])->name('ActivittiesResponses');
Route::get('/activittiesresponses/create',[ActivittiesResponsesController::class, 'create'])->name('Responses');
Route::post('/activittiesresponses/store',[ActivittiesResponsesController::class, 'store'])->name('Responses.store');

Route::get('/disciplina',[DisciplinaController::class, 'index'])->name('Disciplina');
Route::get('/registerdisciplina',[DisciplinaController::class, 'create'])->name('RegisterDisciplina');
Route::post('/registerdisciplina/store',[DisciplinaController::class, 'store'])->name('StoreDisciplina');
Route::post('/registerdisciplina/show',[DisciplinaController::class, 'show'])->name('ShowDisciplina');

Route::get('/aluno',[ActivittiesController::class, 'index'])->name('Aluno');

Route::get('/registeraluno',[RegisterAlunoController::class, 'index'])->name('RegisterAluno');




