<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return view('auth/register');
    }

    public function registerSave(Request $request)
    {
             $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'aluno' => 'nullable|boolean',
                'professor' => 'nullable|boolean',
            ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ])->givePermissionTo('admin');

        if($user){
        if ($request->input('professor'))
        UserRole::create([
            'user_id'=> $user->id,
            'role_id'=> 2
        ]);

        if ($request->input('aluno'))
        UserRole::create([
            'user_id'=> $user->id,
            'role_id'=> 3
        ]);
        }
        return redirect()->route('login')->with('success', 'Usuário registrado com sucesso!');
    }

    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        if($request){

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $request->session()->regenerate();
                return redirect()->route('Activitties');
            }
            return redirect()->route('login')->with('fail', 'Email e/ou senha inválidos!');
        }
        return redirect()->route('login')->with('fail', 'Email e/ou senha inválidos!');
    }
}
