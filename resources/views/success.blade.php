@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card "  style="margin-top:5em;">
                <div class="card-header">Confirm</div>
                <div class="card-body">
                <h2 class="mb-5 mt-2"> Welcome ! {{ Auth::user()->first_name }}</h2>
                <h3>Your application has been submitted successfully!</h3>
                <h3>Please wait patiently while we verify your application !</h3>
                <h3>Goodluck ! Thankyou.</h3>
                <button  onclick="submit()" class="btn btn-success">Logout</button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                <button type="submit" id="submits" >asdads</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function submit() {
        document.getElementById("submits").click();
    }
</script>

@endsection
