<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        return view('auth/register');
    }

    public function registerSave(Request $request)
    {
        //Validação
        $request->validate([
                'name' => 'required|',
                'email' => 'required|email|',
                'password' => 'required|',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //Selecionar na checkbox se é Professor ou Aluno
        if ($user) {
            if ($request->has('professor') && $request->professor) {
                UserRole::create([
                    'user_id' => $user->id,
                    'role_id' => 2,
                ]);
            }

            if ($request->has('aluno') && $request->aluno) {
                UserRole::create([
                    'user_id' => $user->id,
                    'role_id' => 3,
                ]);
            }

            if(Auth::attempt(['name' => $request->name,'email' => $request->email, 'password' => $request->password])){
                $request->session()->regenerate();
                return redirect()->route('login')->with('success', 'Usuário registrado com sucesso!');
        }
    }
        return back()->withErrors([
        'error' => 'Ocorreu um erro ao registrar o usuário. Tente novamente.',
    ]);
}
    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        //Validação
        $request->validate([
            'email' => 'required|email|',
            'password' => 'required|',
    ]);
        //Autenticação
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $request->session()->regenerate();
                return redirect()->route('Activitties')->with('sucess', 'Login realizado com sucesso!');
            }
            return redirect()->route('login')->with('fail', 'Email e/ou senha inválidos!');

    }
}
