<?php

namespace App\Http\Middleware;
use DB;
use Auth;
use Closure;
use Illuminate\Http\Request;

class examiner
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
        if (Auth::user()->user_type_id == 6){
            return $next($request);
        }else{
            // toastr()->error('!','ACCOUNT SUSPENDED!');        
            Auth::logout();
            return redirect('/login');
                }
    }
}
