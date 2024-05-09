<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();

       if ($user){
        UserRole::create([
            'user_id' => $user->id,
            'role_id' => 1
        ]);

       }
        return redirect()->route('login');

    }
}
