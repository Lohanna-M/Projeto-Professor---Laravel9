<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AlunoController extends Controller
{
    public function index (Request $request)
    {
        $users = User::whereHas('userRole', function($query){
            $query->where('role_id', 3);
        })->get();
        return view('aluno', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('alunoedit', compact('user'));
    }

    public function update(Request $request, $id){
    $user = User::findOrFail($id);
    $request->validate([
        'name' => 'required|',
        'email' => 'required|email|',
        'password' => 'required|',
    ]);
    $user->name = $request->input('name');
    $user->email = $request->input('email');

    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password'));
    }

    $user->save();

    return redirect()->route('Aluno')->with('success', 'Usuário atualizado com sucesso.');
}


}

