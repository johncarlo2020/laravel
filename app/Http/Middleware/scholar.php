<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;
use Auth;

class scholar
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
        if (Auth::user()->user_type_id == 3){
            $id = auth()->user()->id;
                $exams = DB::select("SELECT * FROM requirements where id = $id;");
                if (count($exams) == 0) {
                return $next($request);
            }else{
                return $next($request);
                }
        } else{
            toastr()->error('Contact System Administrator!','ACCOUNT SUSPENDED!');        
            Auth::logout();
            return redirect('/login');
                }
    }
}
