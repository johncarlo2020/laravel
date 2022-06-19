<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class address extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function province(Request $request){
        $code=$request->regcode;
        $data = DB::select("SELECT * FROM csas1.refprovince where regCode=$code;");

        return($data);
    }

    public function municipality(Request $request){
        $code=$request->regcode;
        $data = DB::select("SELECT * FROM csas1.refcitymun where provCode=$code;");

        return($data);
    }

    public function brgy(Request $request){
        $code=$request->regcode;
        $data = DB::select("SELECT * FROM csas1.refbrgy where citymunCode=$code;");

        return($data);
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
    public function destroy($id)
    {
        //
    }
}
