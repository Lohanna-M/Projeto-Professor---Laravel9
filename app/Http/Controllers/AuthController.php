<?php

namespace App\Http\Controllers;

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

        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ])->givePermissionTo('admin');

        UserRole::create([
            'user_id'=> $user->id,
            'role_id'=> 1
        ]);

        UserRole::create([
            'user_id'=> $user->id,
            'role_id'=> 2
        ]);

        UserRole::create([
            'user_id'=> $user->id,
            'role_id'=> 3
        ]);

        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
    }
}
