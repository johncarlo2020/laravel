<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
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
            //     if (count($exams) == 0) {
            //     //    dd('more than 0');
            //     return redirect()->route('home');
            // }else{
            //     //    dd('less than 0');
            //     return redirect()->route('withfiles');
            //     }
                return redirect()->route('scholarhome');

            }
            else{
                // dd('sadads');
                return redirect()->route('applicant.home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
}
