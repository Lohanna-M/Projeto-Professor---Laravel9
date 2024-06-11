<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminAccess
{

    public function handle(Request $request, Closure $next)
    {
        $user=User::with('userRole')->find(Auth::user()->id);
        if(Auth::check() && $user->userRole->role_id == 1 || $user->userRole->role_id == 2 ){
        return $next($request);
        }
        return redirect('/')->with('error','Acesso negado');
    }
}
