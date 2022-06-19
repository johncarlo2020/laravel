@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card " style="margin-top:5em;">
                <div class="card-body text-center">
                <h2 class=" mt-2 fw-bold"> Welcome! {{ Auth::user()->first_name }}</h2>
                <h5 class="p-0 m-0">Unfortunately, Your application has been Declined!</h5>
                <h5 class="p-0 m-0">Try Again Next time!</h5>
                <h5 class="p-0 m-0">Goodluck! Thankyou.</h5>
    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
