<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ValidUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, String $userType = 'admin'): Response
    {
        
        if(Auth::user()->userType == $userType){
            return $next($request);
        }
        elseif(Auth::user()->userType == "user"){
            return redirect()->route('index');
        }
        else{
            return redirect()->route('login');
        }
      
    }
}
   