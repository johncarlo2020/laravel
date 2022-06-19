@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card "  style="margin-top:5em;">

                <div class="card-body text-center">
                <h2 class=" mt-2 fw-bold"> Welcome! {{ Auth::user()->first_name }}</h2>
                <p class="p-0 m-0">Your application has been submitted successfully!</p>
                <p class="p-0 m-0">Please wait patiently while we verify your application !</p>
                <p class="p-0 m-0">Goodluck ! Thankyou.</p>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
