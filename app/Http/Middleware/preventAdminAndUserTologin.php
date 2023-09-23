<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class preventAdminAndUserTologin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(request());
        if(Route::getCurrentRoute()->uri()=='admin/login' && Auth::user()){
            return redirect()->route('home');
        }
        if(Route::getCurrentRoute()->uri()=='login' && Auth::guard("admin")->user()){
            return redirect()->route('home');
        }
        if(Route::getCurrentRoute()->uri()=='admin/register'){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
