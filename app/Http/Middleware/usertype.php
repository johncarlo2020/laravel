<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class usertype
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
        // dd('usertypemiddleware');
        if(auth()->user()->user_type_id == 1){
            return $next($request);
        }
        if(auth()->user()->user_type_id == 2){
            return $next($request);
        }
        if(auth()->user()->user_type_id == 3){
            return $next($request);
        }
        if(auth()->user()->user_type_id == 4){
            return $next($request);
        }
        if(auth()->user()->user_type_id == 5){
            return $next($request);
        }
        if(auth()->user()->user_type_id == 6){
            return $next($request);
        }
        if(auth()->user()->user_type_id == 7){
            return $next($request);
        }
   
        return redirect('login')->with('error',"You don't have admin access.");
    }
}
