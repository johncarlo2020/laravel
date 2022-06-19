<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // dd('redirectifauth');
                // return redirect(RouteServiceProvider::HOME);
                if (auth()->user()->user_type_id == 1) {
                    return redirect()->route('staff.home');
                }elseif(auth()->user()->user_type_id == 2){
                    return redirect()->route('coordinator.home');
                }elseif(auth()->user()->user_type_id == 7){
                    return redirect()->route('applicant.declined');
                }elseif(auth()->user()->user_type_id == 6){
                    return redirect()->route('applicant.examiner');
                }elseif(auth()->user()->user_type_id == 3){
                    $id = auth()->user()->id;
                    $exams = DB::select("SELECT * FROM requirements where id = $id;");
                    if (count($exams) == 0) {
                    //    dd('more than 0');
                    return redirect()->route('home');
                }else{
                    //    dd('less than 0');
                    return redirect()->route('withfiles');
                    }
                }
                else{
                    // dd('sadads');
                    return redirect()->route('applicant.home');
                }
            }
        }

        return $next($request);
    }
}
