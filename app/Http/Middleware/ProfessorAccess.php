<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorAccess
{

    public function handle(Request $request, Closure $next)
    {
    $user=User::with('userRole')->find(Auth::user()->id);
    if( $user->userRole->role_id == 2 || $user->userRole->role_id == 1){
    return $next($request);
    }
    return redirect('/')->with('error','Acesso negado');
    }

}
