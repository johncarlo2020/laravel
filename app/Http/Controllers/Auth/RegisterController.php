<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    public function showRegistrationForm(){
        $regions = DB::select("SELECT * FROM csas1.refregion;");
        $schools = DB::select("SELECT * FROM csas1.schools order by name asc;");
        // dd($regions);
        return view('auth.register',compact('regions','schools'));

    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lname' => ['required', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'mname' => [  'max:255'],
            'suffix' => [  'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'municipality' => ['required', 'string', 'max:255'],
            'brgy' => ['required', 'string', 'max:255'],
            'house' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'bday' => ['required'],
            'course' => ['required', 'string', 'max:255'],
            'school' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'income' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $region=$data['region'];
        $province=$data['province'];
        $municipality=$data['municipality'];
        $brgy=$data['brgy'];
        $schoolid=$data['school'];
        $regions = DB::select("SELECT regDesc FROM csas1.refregion where regCode=$region;");
        $provinces = DB::select("SELECT provDesc FROM csas1.refprovince where provCode=$province;");
        $municipalities=DB::select("SELECT citymunDesc FROM csas1.refcitymun where citymunCode=$municipality;");
        $brgys=DB::select("SELECT brgyDesc FROM csas1.refbrgy where brgyCode=$brgy;");
        $school=DB::select("SELECT * FROM csas1.schools where id=$schoolid;");
        $address=$data['house'].' '.$brgys[0]->brgyDesc.', '.$municipalities[0]->citymunDesc.' '.$provinces['0']->provDesc.' '.$regions[0]->regDesc ;
       // dd($regions);


        return User::create([
            'user_type_id'=>5,
            'last_name' =>$data['lname'] ,
            'first_name' =>$data['fname'] ,
            'middle_name' =>$data['mname'] ,
            'suffix' =>$data['suffix'] ,
             'address' => $address,
            'gender' =>$data['gender'] ,
            'birth_date' =>$data['bday'],
            'course' =>$data['course'] ,
            'school_name' => $school[0]->name,
            'school_address' => $school[0]->address,
            'income'=> $data['income'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
