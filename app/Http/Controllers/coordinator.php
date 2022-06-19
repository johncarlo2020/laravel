<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use DB;
use Carbon\Carbon;

class coordinator extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select("SELECT *,TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) AS age FROM csas1.users where user_type_id = 7;");
        return view('/coordinator.coordinatordeclined', compact('users'));

    }
    public function applicant()
    {
        // dd('asas');
        return view('/coordinator.coordinatorapplicant');
    }
    //accepting sa declined
    public function accepting($id)
    {
        // dd('accepting' . $id);
        $date = Carbon::now()->format('Y-m-d');
        $users = DB::select("UPDATE users SET user_type_id=6 where id=$id ;");

        $sched=DB::select("INSERT INTO `examiner_exam` (`exam_id`, `user_id`) VALUES ('1',  $id);");
        $exams = DB::select("SELECT count(*) as count FROM exams where date = '$date';");
        // dd($exams);
        $dell=DB::select("DELETE FROM exams WHERE id=$id;");


        if ($exams[0]->count <= 500) {
            if ($exams[0]->count > 0) {
                $exam = $exams[0]->count;
                $exam = $exam + 1;
                // dd($exam);
            $examz = DB::select("UPDATE users SET exnumber=$exam where id=$id ;");
            $users = DB::select("INSERT INTO exams (id, slot, date) VALUES ($id, $exam, '$date');");
            } else{
                // dd('else');
                $exam = 1;
                $examz = DB::select("UPDATE users SET exnumber=$exam where id=$id ;");
                $users = DB::select("INSERT INTO exams (id, slot, date) VALUES ($id, $exam, '$date');");
            }
        }else{
            $date = Carbon::tomorrow()->format('Y-m-d');
            $exams = DB::select("SELECT count(*) as count FROM exams where date = '$date';");
                if ($exams[0]->count > 0) {
                    $exam = $exams[0]->count;
                    $exam = $exam + 1;
                    // dd($exam);
                $examz = DB::select("UPDATE users SET exnumber=$exam where id=$id ;");
                $users = DB::select("INSERT INTO exams (id, slot, date) VALUES ($id, $exam, '$date');");
                } else{
                    // dd('else');
                    $exam = 1;
                    $examz = DB::select("UPDATE users SET exnumber=$exam where id=$id ;");
                    $users = DB::select("INSERT INTO exams (id, slot, date) VALUES ($id, $exam, '$date');");
                }
        }
        $email=DB::select("select email ,first_name,last_name,user_type_id,exnumber from users where id=$id");
        $data = [
            'fname'=>'',
            'lname'=>'',
            'status'=>'',

        ];
         $data['fname'] = $email[0]->first_name;
         $data['lname'] = $email[0]->last_name;
         $data['status'] = $email[0]->user_type_id;

        // Mail::to($email[0]->email)->send(new WelcomeMail( $data));
        toastr()->success('Applicant Accepted Successfully',$email[0]->first_name .' '.$email[0]->last_name.' Will move to examiners');
        return redirect('coordinator/declined');
    }
    //accepted sa new applicant
    public function accepted($id)
    {
        // dd('accepted' . $id);
        $date = Carbon::now()->format('Y-m-d');
        $users = DB::select("UPDATE users SET user_type_id=6 where id=$id ;");
        $sched=DB::select("INSERT INTO `examiner_exam` (`exam_id`, `user_id`) VALUES ('1',  $id);");
        $exams = DB::select("SELECT count(*) as count FROM exams where date = '$date';");
        // dd($exams);
        if ($exams[0]->count <= 500) {
            if ($exams[0]->count > 0) {
                $exam = $exams[0]->count;
                $exam = $exam + 1;
                // dd($exam);
            $examz = DB::select("UPDATE users SET exnumber=$exam where id=$id ;");
            $users = DB::select("INSERT INTO exams (id, slot, date) VALUES ($id, $exam, '$date');");
            } else{
                // dd('else');
                $exam = 1;
                $examz = DB::select("UPDATE users SET exnumber=$exam where id=$id ;");
                $users = DB::select("INSERT INTO exams (id, slot, date) VALUES ($id, $exam, '$date');");
            }
        }else{
            $date = Carbon::tomorrow()->format('Y-m-d');
            $exams = DB::select("SELECT count(*) as count FROM exams where date = '$date';");
                if ($exams[0]->count > 0) {
                    $exam = $exams[0]->count;
                    $exam = $exam + 1;
                    // dd($exam);
                $examz = DB::select("UPDATE users SET exnumber=$exam where id=$id ;");
                $users = DB::select("INSERT INTO exams (id, slot, date) VALUES ($id, $exam, '$date');");
                } else{
                    // dd('else');
                    $exam = 1;
                    $examz = DB::select("UPDATE users SET exnumber=$exam where id=$id ;");
                    $users = DB::select("INSERT INTO exams (id, slot, date) VALUES ($id, $exam, '$date');");
                }
        }
        $email=DB::select("select email ,first_name,last_name,user_type_id,exnumber,address from users where id=$id");
        $data = [
            'fname'=>'',
            'lname'=>'',
            'status'=>'',
            'stubnum'=>'',
            'time'=>'',
            'date'=>'',
            'address'=>'',

        ];
         $data['fname'] = $email[0]->first_name;
         $data['lname'] = $email[0]->last_name;
         $data['status'] = $email[0]->user_type_id;
         $data['stubnum'] = $email[0]->exnumber;
         $data['address'] = $email[0]->address;

         if($email[0]->exnumber >= 250){
            $data['time'] = '01:00 pm - 04:00 pm';
         }else{
            $data['time'] = '8:00 am - 11:00 am';
         }


        Mail::to($email[0]->email)->send(new WelcomeMail( $data));
        toastr()->success('Applicant Accepted Successfully',$email[0]->first_name .' '.$email[0]->last_name.' Will move to examiners');
        return redirect('coordinator/home');
    }
    //declined sa new applicant
    public function rejected($id)
    {
        // dd('accepted' . $id);
        $users = DB::select("UPDATE users SET user_type_id=7 where id=$id ;");
        $email=DB::select("select email ,first_name,last_name,user_type_id,exnumber from users where id=$id");
        $data = [
            'fname'=>'',
            'lname'=>'',
            'status'=>'',
            'time'=>'',

        ];
         $data['fname'] = $email[0]->first_name;
         $data['lname'] = $email[0]->last_name;
         $data['status'] = $email[0]->user_type_id;

        Mail::to($email[0]->email)->send(new WelcomeMail( $data));
        toastr()->warning('Applicant Rejected Successfully',$email[0]->first_name .' '.$email[0]->last_name.' Will move to Declined');
        return redirect('coordinator/home');
    }

    public function scholars()
    {
        $users = DB::select("SELECT *,TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) AS age FROM csas1.users where user_type_id = 3;");
        $files = DB::select("SELECT * FROM requirements;");
        return view('/coordinator.coordinatorscholar',compact('users','files'));

    }

    public function examiners()
    {
        $stab = DB::select("SELECT * FROM exams;");
        $users = DB::select("SELECT *,TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) AS age FROM csas1.users where user_type_id = 6;");
        return view('/coordinator.coordinatorexaminer',compact('users','stab'));

    }

    public function examaccepted($id,request $request)
    {
        $grade = $request->grade;

        $data = [
            'fname'=>'',
            'lname'=>'',
            'status'=>'',
            'stubnum'=>'',
            'time'=>'',
            'date'=>'',
            'address'=>'',

        ];
        $email=DB::select("select email ,first_name,last_name,user_type_id,exnumber from users where id=$id");
        $data['fname'] = $email[0]->first_name;
        $data['lname'] = $email[0]->last_name;
        $data['status'] = $email[0]->user_type_id;

       Mail::to($email[0]->email)->send(new WelcomeMail( $data));

        if ($grade < 75) {
            $users = DB::select("UPDATE users SET user_type_id=7 where id=$id ;");
            toastr()->warning('Examinee failed the exam',$email[0]->first_name .' '.$email[0]->last_name.' Will move to Declined');
        }else{
            $users = DB::select("UPDATE users SET user_type_id=3 where id=$id ;");
            toastr()->success('Examinee passed the exam',$email[0]->first_name .' '.$email[0]->last_name.' Will move to Scholars');
        }
        $users = DB::select("UPDATE users SET score=$grade where id=$id ;");

        // toastr()->success('Examinee passed the exam',$email[0]->first_name .' '.$email[0]->last_name.' Will move to Scholars');

        return redirect('coordinator/examiners');
    }

    public function examrejected($id)
    {

        $data = [
            'fname'=>'',
            'lname'=>'',
            'status'=>'',

        ];

        // dd('accepted' . $id);
        $users = DB::select("UPDATE users SET user_type_id=7 where id=$id ;");
        $email=DB::select("select email ,first_name,last_name,user_type_id,exnumber from users where id=$id");
        $data['fname'] = $email[0]->first_name;
        $data['lname'] = $email[0]->last_name;
        $data['status'] = $email[0]->user_type_id;

       Mail::to($email[0]->email)->send(new WelcomeMail( $data));
        toastr()->warning('Examinee failed the exam',$email[0]->first_name .' '.$email[0]->last_name.' Will move to rejects');
        return redirect('coordinator/examiners');

    }

    public function examdate(){



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function delete(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $users = DB::select("delete from users where id=$id ;");
        $stab = DB::select("delete FROM exams where id=$id;");
        toastr()->success($name . ' Deleted Successfully');
        return redirect('coordinator/declined');
    }
    public function deletes(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $users = DB::select("delete from users where id=$id ;");
        $stab = DB::select("delete FROM exams where id=$id;");
        toastr()->success($name . ' Deleted Successfully');
        return redirect('coordinator/scholars');
    }
}
