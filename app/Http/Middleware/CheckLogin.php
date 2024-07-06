<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        if(session('userRole') == 'admin'){
            return "admin";

        }else{
            return redirect('login');
        }
        // if(!Session()->has('loginUser')){
        //     return redirect('login')->with('fail','You have to login first');
        // }
        // return $next($request);
        return "fff";
    }
}
