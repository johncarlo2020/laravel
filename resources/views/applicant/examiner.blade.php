@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card "  style="margin-top:5em;">

                <div class="card-body text-center">
                <h2 class=" mt-2 fw-bold"> Welcome! {{ Auth::user()->first_name }}</h2>
                <p class="p-0 m-0">You are now <b>Qualified</b> to take an exam.</p>
                <p class="p-0 m-0">Please check your email for your exam schedule.</p><br>
                <p class="p-0 m-0">Please bring a copy of the <u>examination pass</u> as proof of qualification to take the exam.</p>
                <p class="p-0 m-0">Goodluck! Thankyou.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
