<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user=User::with('userRole')->find(Auth::user()->id);
        if(!isset($user->userRole)){
            return redirect('/')->with('error','Acesso negado');
        }
        if(Auth::check() && $user->userRole->role_id == 1){
            return $next($request);
        }else{
            if(!Auth::check()){
                return redirect('/login');
            }
            return redirect('/')->with('error','Acesso negado');
        }
    }
}
