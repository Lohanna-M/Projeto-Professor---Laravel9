<?php

use App\Http\Controllers\ActivittiesController;
use App\Http\Controllers\ActivittiesResponsesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ControledeatividadesController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\RegisterActivittiesController;
use App\Http\Controllers\RegisterAlunoController;
use App\Http\Controllers\RegisterDisciplinaController;
use App\Http\Middleware\AdminAccess;
use App\Http\Middleware\AlunoAccess;
use App\Http\Middleware\ProfessorAccess;
use App\Models\ActivittiesResponses;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

Route::controller(AuthController::class,)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/registerSave', 'registerSave')->name('register.save');

    Route::get('/', 'login',)->name('login');
    Route::post('/login', 'loginAction',)->name('login.action');
});

Route::middleware(['aluno'])->group(function(){
    Route::get('/activittiesresponses', [ActivittiesResponsesController::class, 'index'])->name('ActivittiesResponses');
    Route::get('/activittiesresponses/create', [ActivittiesResponsesController::class, 'create'])->name('Responses');
    Route::post('/activittiesresponses/store', [ActivittiesResponsesController::class, 'store'])->name('Responses.store');
 });

Route::middleware(['professor'])->group(function(){
    Route::get('/activitties', [ActivittiesController::class, 'index'])->name('Activitties');
    Route::get('/activitties/create', [ActivittiesController::class, 'create'])->name('CreateActivitties');
    Route::get('/activitties/{id}', [ActivittiesController::class, 'show'])->name('ShowActivitties');
    Route::post('/activitties/store', [ActivittiesController::class, 'store'])->name('StoreActivitties');
    Route::get('/activitties/{id}/edit', [ActivittiesController::class, 'edit'])->name('EditActivitties');
    Route::put('/activitties/{id}', [ActivittiesController::class, 'update'])->name('UpdateActivitties');
    Route::delete('/activitties/{id}', [ActivittiesController::class, 'destroy'])->name('DeleteActivitties');
    

    Route::get('/registeractivitties', [ActivittiesController::class, 'create'])->name('RegisterActivitties');
    Route::post('/registeractivitties/store', [ActivittiesController::class, 'store'])->name('RegisterStore');
    Route::post('/registeractivitties/show', [ActivittiesController::class, 'show'])->name('RegisterShow');

    Route::get('/disciplina', [DisciplinaController::class, 'index'])->name('Disciplina');
    Route::get('/registerdisciplina', [DisciplinaController::class, 'create'])->name('RegisterDisciplina');
    Route::post('/registerdisciplina/store', [DisciplinaController::class, 'store'])->name('StoreDisciplina');
    Route::post('/registerdisciplina/show', [DisciplinaController::class, 'show'])->name('ShowDisciplina');

    Route::get('/aluno', [ActivittiesController::class, 'index'])->name('Aluno');
    Route::get('/registeraluno', [RegisterAlunoController::class, 'index'])->name('RegisterAluno');
});
