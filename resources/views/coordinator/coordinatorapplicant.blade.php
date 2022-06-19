@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">


<div class="container " style="padding-top:6em">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">asdasd
                <div class="col">
                    <a href="{{ route('coordinator.home') }}" class="btn btn-primary">New Applicants</a>
                    <a href="{{ route('coordinator.scholars') }}" class="btn btn-outline-primary  rounded-0">Examinees</a>
                    <a href="{{ route('coordinator.scholars') }}" class="btn btn-primary">Scholars</a>
                    <a href="{{ route('coordinator.declined') }}" class="btn btn-primary">Declined Applicants</a>

                </div>
            </div>
            <div class="card">
                <div class="card-header">Coordinatorz</div>
                <div class="card-body">
                <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th><center>Fullname</center></th>
                                <th><center>Address</center></th>
                                <th><center>School</center></th>
                                <th><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}</td>
                                <td>{{$user->Address}}</td>
                                <td>{{$user->school_name}}</td>
                                <td>
                                    <button first_name="{{$user->first_name}}" last_name="{{$user->last_name}}" middle_name="{{$user->middle_name}}" suffix="{{$user->suffix}}" address="{{$user->address}}" age="{{$user->age}}" gender="{{$user->gender}}" birth_date="{{$user->birth_date}}" course="{{$user->course}}" school_name="{{$user->school_name}}" school_address="{{$user->school_address}}" email="{{$user->email}}" income="{{$user->income}}" class="details btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailed">Detailed Info</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- detailed -->
<div class="modal fade" id="detailed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Complete Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><b>Name : </b>           <span class="name"></span></p>
        <p><b>Address : </b>        <span class="address"></span></p>
        <p><b>Gender : </b>         <span class="gender"></span></p>
        <p><b>Birth Date : </b>     <span class="birth_date"></span></p>
        <p><b>Course : </b>         <span class="course"></span></p>
        <!-- <p><b>Year : </b>           <span class=""></span></p> -->
        <p><b>School : </b>         <span class="school_name"></span></p>
        <p><b>School Address : </b> <span class="school_address"></span></p>
        <p><b>Email : </b>          <span class="email"></span></p>
        <p><b>Monthly Income : </b> <span class="income"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
<script>

$('.details').on('click', function(e) {
    e.preventDefault();
      var first_name     = $(this).attr("first_name");
      var last_name   = $(this).attr("last_name");
      var middle_name  = $(this).attr("middle_name");
      var suffix   = $(this).attr("suffix");
      var address  = $(this).attr("address");
      var age    = $(this).attr("age");
      var gender    = $(this).attr("gender");
      var birth_date    = $(this).attr("birth_date");
      var course    = $(this).attr("course");
      var school_name = $(this).attr("school_name");
      var school_address = $(this).attr("school_address");
      var email = $(this).attr("email");
      var income = $(this).attr("income");
      console.log(first_name);
        console.log(last_name);
        console.log(middle_name);
        console.log(suffix);
        console.log(address);
        console.log(age);
        console.log(gender);
        console.log(birth_date);
        console.log(course);
        console.log(school_name);
        console.log(school_address);
        console.log(email);
      console.log(income);
        var name = last_name + ", " + first_name + " " + middle_name + ", " + suffix;
      $(".name").text( name).change();
      $(".address").text( address).change();
      $(".age").text( age).change();
      $(".gender").text( gender).change();
      $(".birth_date").text( birth_date).change();
      $(".course").text( course).change();
      $(".school_name").text( school_name).change();
      $(".school_address").text( school_address).change();
      $(".email").text( email).change();
      $(".income").text( income).change();

});

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ],
        columnDefs: [ {
            // targets: -1,
            // visible: false
        } ]
    } );
} );
</script>
@endsection
