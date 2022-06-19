@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">


<div class="" style="padding-top:6em; padding-left:3em; padding-right:3em;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col">
                    <a href="{{ route('coordinator.home') }}" class="btn btn-primary rounded-0">New Applicants</a>
                    <a href="{{ route('coordinator.examiners') }}" class="btn btn-outline-primary  rounded-0">Examinees</a>

                    <a href="{{ route('coordinator.scholars') }}" class="btn btn-outline-primary  rounded-0">Scholars</a>
                    <a href="{{ route('coordinator.declined') }}" class="btn btn-outline-primary  rounded-0">Declined Applicants</a>

                </div>
            </div>
            <div class="card mt-4 cardContainer">
                {{-- <div class="card-header">Coordinatorz</div> --}}
                <div class="card-body">
                <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Address</th>
                                <th>School</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->school_name}}</td>
                                <td>
                                    <button id="{{$user->id}}" first_name="{{$user->first_name}}" last_name="{{$user->last_name}}" middle_name="{{$user->middle_name}}" suffix="{{$user->suffix}}" address="{{$user->address}}" age="{{$user->age}}" gender="{{$user->gender}}" birth_date="{{$user->birth_date}}" course="{{$user->course}}" school_name="{{$user->school_name}}" school_address="{{$user->school_address}}" email="{{$user->email}}" income="{{$user->income}}" class="details btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailed">Detailed Info</button>
                                    <!-- <button class="btn btn-outline-primary">View Files</button> -->
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
    <div class="modal-content p-2">
      <div class="modal-header p-2">
        <h5 class="modal-title fw-bold" id="exampleModalLabel">Student Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body modalContainer">
          <div class="student-info">
            <p class="h6 fw-bold legend-details">Personal Information</p>
            <p><b>id : </b><span class="id"></span></p>
            <p><b>Name : </b><span class="name"></span></p>
            <p><b>Address : </b><span class="address"></span></p>
            <p><b>Gender : </b><span class="gender"></span></p>
            <p><b>Birth Date : </b><span class="birth_date"></span></p>
            <p><b>Email : </b>  <span class="email"></span></p>
            <p class="h6  fw-bold legend-details">School Information</p>
            <p><b>Course : </b><span class="course"></span></p>
            <p><b>School : </b> <span class="school_name"></span></p>
            <p><b>School Address : </b><span class="school_address"></span></p>
            <p class="h6  fw-bold legend-details">Montly income</p>
            <p><b>Amount : </b><span class="income"></span></p>
          </div>
          <div class="accept d-none">
              <div class="row text-center py-4">
                <h5  class="border-remove ">Do you want to accept this Student <span class="name"></span>?</h5>
              </div>
              <div class="accept-button d-none row mt-3">
                  <div class="col">
                    <button type="button" class="btn btn-outline-danger rounded-0 w-100" data-bs-dismiss="modal" >No</button>
                  </div>
                  <div class="col">
                    <a href="" type="button" class="accepted btn btn btn-success rounded-0 w-100">Yes</a>
                </div>
              </div>
          </div>
          <div class="reject d-none">
            <div class="row text-center py-4">
                <h5  class="border-remove ">Do you want to reject this Student <span class="name"></span>?</h5>
              </div>
              <div class="reject-button d-none row mt-3">
                  <div class="col">
                    <button type="button" class="btn btn-outline-danger rounded-0 w-100" data-bs-dismiss="modal" >No</button>
                  </div>
                  <div class="col">
                    <a href="" type="button" class="rejected btn btn btn-success rounded-0 w-100">Yes</a>
                </div>
              </div>
      </div>
      <div class="modal-footer">
          <div class="default">
            <button type="button" class="btn btn btn-primary rounded-0" onclick="accept()">Accept</button>
            <button type="button" class="btn btn-outline-danger rounded-0"  onclick="reject()" >Reject</button>
          </div>
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
      var id     = $(this).attr("id");
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
        console.log(id);
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
      $(".id").text( id).change();
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

      $('.modal-title').removeClass('d-none');
      $('.student-info').removeClass('d-none');
      $('.reject-button').addClass('d-none');
      $('.reject').addClass('d-none');
      $('.accept-button').addClass('d-none');
      $('.accept').addClass('d-none');
      $('.default').removeClass('d-none');
      $('.modal-footer').removeClass('d-none');
      $('.modal-header').removeClass('border-remove');

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
        columnDefs: [ {} ]
    } );
} );

function accept(){
    var id  = $('.id').text();
    let url = "{{ route('coordinator.accepted', '/') }}";
    $(".accepted").attr('href', url+'/'+id).change();
    $('.modal-title').addClass('d-none');
    $('.student-info').addClass('d-none');
    $('.accept-button').removeClass('d-none');
    $('.accept').removeClass('d-none');
    $('.default').addClass('d-none');
    $('.modal-footer').addClass('d-none');
    $('.modal-header').addClass('border-remove');
}


function reject(){
  var id  = $('.id').text();
    let url = "{{ route('coordinator.rejected', '/') }}";
    $(".rejected").attr('href', url+'/'+id).change();
    $('.modal-title').addClass('d-none');
    $('.student-info').addClass('d-none');
    $('.reject-button').removeClass('d-none');
    $('.reject').removeClass('d-none');
    $('.default').addClass('d-none');
    $('.modal-footer').addClass('d-none');
    $('.modal-header').addClass('border-remove');
}
</script>
@endsection
