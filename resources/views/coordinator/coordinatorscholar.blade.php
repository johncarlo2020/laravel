@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">


<div class="" style="padding-top:6em; padding-left:3em; padding-right:3em;">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col">
                    <a href="{{ route('coordinator.home') }}" class="btn btn-outline-primary rounded-0">New Applicants</a>
                    <a href="{{ route('coordinator.examiners') }}" class="btn btn-outline-primary  rounded-0">Examinees</a>
                    <a href="{{ route('coordinator.scholars') }}" class="btn btn-primary rounded-0">Scholars</a>
                    <a href="{{ route('coordinator.declined') }}" class="btn btn-outline-primary rounded-0">Declined Applicants</a>

                </div>
            </div>
            <div class="card mt-4 cardContainer">

                <div class="card-body">
                <table id="example" class="display table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Last&nbsp;Name</th>
                                <th>First&nbsp;Name</th>
                                <th>Middle&nbsp;Name</th>
                                <th>Address</th>
                                <th>School</th>
                                <th>Exam&nbsp;score</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td style=" text-transform: capitalize;">{{$user->last_name}}</td>
                                <td style=" text-transform: capitalize;">{{$user->first_name}}</td>
                                <td style=" text-transform: capitalize;">{{$user->middle_name}}</td>
                                <td style=" text-transform: capitalize;">{{$user->address}}</td>
                                <td>{{$user->school_name}}</td>
                                <td><center>{{$user->score}} %</center></td>
                                <td>
                                    <button first_name="{{$user->first_name}}" last_name="{{$user->last_name}}" middle_name="{{$user->middle_name}}" suffix="{{$user->suffix}}" address="{{$user->address}}" age="{{$user->age}}" gender="{{$user->gender}}" birth_date="{{$user->birth_date}}" course="{{$user->course}}" school_name="{{$user->school_name}}" school_address="{{$user->school_address}}" email="{{$user->email}}" income="{{$user->income}}" class="details btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailed">Detailed&nbsp;Info</button>
                                    @foreach($files as $file)
                                        @if($user->id == $file->id)
                                            <button  class="files btn btn-outline-primary"  data-bs-toggle="modal" data-bs-target=".files{{$file->id}}">View Files</button>

                                       <!-- files -->
                                            <div class="files{{$file->id}} modal fade"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Uploaded Files</h5>
                                                    <button type="button" idz="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="row  p-3 ">
                                                            <div class="col-lg-4 col-12 border p-2 text-center">
                                                                <label for="cor" class="col-form-label text-md-right mb-1 h3 fw-bold "> Certificate of Registration</label>
                                                                <center><img class="img-fluid rounded mx-auto d-block border p-2 " id="blah" style="max-height: 200px;" height="150px" src="
                                                                <?php if (getimagesize($file->cor) == false) {echo(asset('images/pdf.webp'));}else{echo(asset($file->cor));}?>
                                                                " alt="Image Unavailable"></center>
                                                                <a class="btn btn-outline-primary rounded-0 mt-3 " href="{{ asset($file->cor) }}" download>Click here to download file</a>
                                                            </div>

                                                            <div class="col-lg-4 col-12  border  p-2 text-center">
                                                                <label for="cog" class="col-form-label text-md-right mb-1 h3 fw-bold">Certificate of Grades</label>
                                                                <center><img class="img-fluid rounded mx-auto d-block  border p-2 " id="cogimage" style="max-height: 200px;" height="150px" src="
                                                                <?php if (getimagesize($file->cog) == false) {echo(asset('images/pdf.webp'));}else{echo(asset($file->cog));}?>
                                                                " alt="Image Unavailable"></center>
                                                                <a class="btn btn-outline-primary rounded-0 mt-3 " href="{{ asset($file->cog) }}" download>Click here to download file</a>
                                                            </div>
                                                            <div class="col-lg-4 col-12  border p-2 text-center">
                                                                <label for="id" class="col-form-label text-md-right mb-1 h3 fw-bold">ID</label>
                                                                <center><img class="img-fluid rounded mx-auto d-block  border p-2 " id="idimage" style="max-height: 200px;" height="150px" src="
                                                                    <?php if (getimagesize($file->id_) == false) {echo(asset('images/pdf.webp'));}else{echo(asset($file->id_));}?>
                                                                " alt="Image Unavailable"></center>
                                                                <a class="btn btn-outline-primary rounded-0 mt-3" download href="{{ asset($file->id_) }}" >Click here to download file</a>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer d-none">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            @endif
                                    @endforeach
                                    <!-- <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$user->id}}">Delete</button> -->
                                            <!-- delete -->
                                            <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="text-danger modal-title " id="exampleModalLabel">Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('coordinator.deletes') }}" method="post">
                                                    @csrf
                                                    @method('post')
                                                    <input type="" name="id"  value="{{$user->id}}" hidden>
                                                    <input type="" name="name"  value="{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}" hidden>
                                                    <h5>Do you want to delete <b>{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}</b> ?</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
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
            <p class="h6 fw-bold legend-details">Personal Information</p>
            <p><b>Name : </b><span class="name"></span></p>
            <p><b>Address : </b><span class="address"></span></p>
            <p><b>Gender : </b><span class="gender"></span></p>
            <p><b>Birth Date : </b><span class="birth_date"></span></p>
            <p><b>Email : </b> <span class="email"></span></p>
            <p class="h6  fw-bold legend-details">School Information</p>
            <p><b>Course : </b><span class="course"></span></p>
            <!-- <p><b>Year : </b>           <span class=""></span></p> -->
            <p><b>School : </b> <span class="school_name"></span></p>
            <p><b>School Address : </b><span class="school_address"></span></p>
            <p class="h6  fw-bold legend-details">Montly income</p>
            <p><b>Amount : </b><span class="income"></span></p>


          </div>
        <div class="modal-footer d-none ">
         <button type="button" class="btn btn btn-outlineprimary">Accept</button>
         <button type="button" class="btn btn-outline-danger rounded-0" data-bs-dismiss="modal">Reject</button>
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
