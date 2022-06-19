<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use File;



class scholar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('scholarcontroller');
        return view('success');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function scholarhome()
    {
        return view('applicant.scholarhome');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user  = Auth::user()->id;
        $name  = Auth::user()->first_name . Auth::user()->middle_name . Auth::user()->last_name; 
        $exist = DB::select("select * from requirements where id = $user");
        // dd($exist);

        // $exist = $exist[0]->id;
        // dd('walang laman');
        // $exist = DB::select("UPDATE requirements SET column1=value, column2=value2 WHERE some_column=some_value ");

        if($exist != null){
            // dd('meron laman');
            $tist = DB::select("DELETE FROM requirements WHERE id = $user");
            $exist = DB::select("INSERT INTO requirements (id) VALUES ($user)");
        }else{
            // dd('walang laman');
            $exist = DB::select("INSERT INTO requirements (id) VALUES ($user)");
        }
        $data['name'] = DB::select("select first_name FROM users where id = $user");
        $data['name'] = $data['name'][0]->first_name;
        // dd($user);
        $cog                = $request -> file('cog');
        $id                 = $request -> file('id');
        $cor                = $request -> file('cor');
        // dd($cor);   
        if ($cor != null) {
            $files         = $request -> file('cor');
            $file          = $files[0]->getClientOriginalName();
            $file = explode(".", $file);
            $file = end($file);
            // dd($file);
            $imagename      = $name . '_COR.' . $file;
            $path           = 'files/scholars/'.$user;
            $data['file']  = $path."/".$imagename;
            File::deleteDirectory(public_path($path));
                foreach ($files as $file) {
                    $file -> move($path , $imagename);  
                    $pat = $path .'/'. $imagename;
                }
        $exist = DB::select("UPDATE requirements SET cor='$pat' WHERE id=$user");
        // toastr()->success($data['name'] .' Added Successfully!','Menu');
        }else{
        // toastr()->warning($data['name'] .' Cor is empty!','Scholar');
        }
        if ($cog != null) {
            $files         = $request -> file('cog');
            $file          = $files[0]->getClientOriginalName();
            $file = explode(".", $file);
            $file = end($file);
            // dd($file);
            $imagename      = $name . '_COG.' . $file;
            $path           = 'files/scholars/'.$user;
                foreach ($files as $file) {
                    $file -> move($path , $imagename);  
                    $pat = $path .'/'. $imagename;
                    $exist = DB::select("UPDATE requirements SET cog='$pat' WHERE id=$user ");

                }
        // toastr()->success($data['name'] .' Added Successfully!','Menu');
        }else{
        // toastr()->warning($data['name'] .' Cog is empty!','Scholar');
        }
        if ($id != null) {
            $files         = $request -> file('id');
            $file          = $files[0]->getClientOriginalName();
            $file = explode(".", $file);
            $file = end($file);
            // dd($file);
            $imagename      = $name . '_ID.' . $file;
            $path           = 'files/scholars/'.$user;
                foreach ($files as $file) {
                    $file -> move($path , $imagename);  
                }
                $pat = $path .'/'. $imagename;
        $exist = DB::select("UPDATE requirements SET id_='$pat' WHERE id=$user ");
        toastr()->success('Record Updated Successfully','Scholar Requirements');
        return redirect()->route('withfiles');

        // return redirect('/scholar/success');
        }else{ 
        // toastr()->warning($data['name'] .' Id is empty!','Scholar');
        return redirect()->route('withfiles');

        // return redirect('/scholar/success');
        }

    }

    public function withfiles(){
        $id  = Auth::user()->id;
        $users = DB::select("SELECT * FROM users where id = $id;");
        // dd($users);
        $files = DB::select("SELECT * FROM requirements;");
        $age = DB::select("SELECT TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) AS age FROM users where id = $id;");
        $exam = DB::select("SELECT * FROM exams where id = $id;");
        return view('/applicant.scholarzz',compact('users','exam','age','files'));
    }
    public function withoutfiles(){
        $id  = Auth::user()->id;
        $users = DB::select("SELECT * FROM users where id = $id;");
        $age = DB::select("SELECT TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) AS age FROM users where id = $id;");
        $exam = DB::select("SELECT * FROM exams where id = $id;");
        return view('/applicant.scholar',compact('users','exam','age'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
