@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card "  style="margin-top:5em;">
                <div class="card-header">Scholar Details</div>
                <div class="card-body row">
                    <div class="student-info col-6">
                        <p class="h6 fw-bold legend-details">Personal Information</p>
                        <p><b>Name :            </b>{{$users[0]->first_name}} {{$users[0]->middle_name}} {{$users[0]->last_name}} , {{$users[0]->suffix}} </p>
                        <p><b>Address :         </b>{{$users[0]->address}} </p>
                        <p><b>Age :             </b>{{$age[0]->age}}</p>
                        <p><b>Gender :          </b>{{$users[0]->gender}} </p>
                        <p><b>Birth Date :      </b>{{$users[0]->birth_date}} </p>
                        <p><b>Email :           </b>{{$users[0]->email}} </p>
                        <p class="h6  fw-bold legend-details">School Information</p>
                        <p><b>Course :          </b>{{$users[0]->course}} </p>
                        <p><b>School :          </b>{{$users[0]->school_name}} </p>
                        <p><b>School Address :  </b>{{$users[0]->school_address}}</p>
                        <p class="h6  fw-bold legend-details">Montly income</p>
                        <p><b>Amount :          </b>{{$users[0]->income}}</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
