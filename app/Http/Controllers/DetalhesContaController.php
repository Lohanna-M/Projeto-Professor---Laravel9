<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DetalhesContaController extends Controller
{

    public function index ($id)
    {
        $user = User::findOrFail($id);
        return view('detalhescontaaluno', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('attconta', compact('user'));
    }

    public function update(Request $request, $id){
    $user = User::findOrFail($id);
    $request->validate([
        'name' => 'required|',
        'email' => 'required|email|',
    ]);
    $user->name = $request->input('name');
    $user->email = $request->input('email');

    $user->save();

    return redirect()->route('Activitties')->with('success', 'Conta atualizada com sucesso.');
    }


}
