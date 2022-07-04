@extends('layouts.app')
@section('content')
<div class="container pt-5 h-100">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card "  style="margin-top:5em;">
            <div class="card-header mt-1"><h4> Details</h4></div>

            <div class="card-body row">
               <div class="student-info col-12 ">
                   <div class="row">
                        <div class="student-info col-6">
                            <p class="h6 fw-bold legend-details">Personal Information</p>
                            <p><b>Name :            </b>{{$users[0]->first_name}} {{$users[0]->middle_name}} {{$users[0]->last_name}}
                            @if($users[0]->suffix != null)
                            ,
                            @endif
                            {{$users[0]->suffix}} </p>
                            <p><b>Address :         </b>{{$users[0]->address}} </p>
                            <p><b>Age :             </b>{{$age[0]->age}}</p>
                            <p><b>Gender :          </b>{{$users[0]->gender}} </p>
                            <p><b>Birth Date :      </b>{{$users[0]->birth_date}} </p>
                            <p><b>Email :           </b>{{$users[0]->email}} </p>
                        </div>
                        <div class="student-info col-6">
                            <p class="h6  fw-bold legend-details">School Information</p>
                            <p><b>Course :          </b>{{$users[0]->course}} </p>
                            <p><b>School :          </b>{{$users[0]->school_name}} </p>
                            <p><b>School Address :  </b>{{$users[0]->school_address}}</p>
                            <p class="h6  fw-bold legend-details">Monthly income</p>
                            <p><b>      </b>{{$users[0]->income}}</p>
                            <p class="h6  fw-bold legend-details">Days Scholar</p>
                            <p><b>Amount :          </b>{{$users[0]->datez}} Days</p>
                        </div>
                    </div>
               </div>
            </div>
            @foreach($files as $file)
            @if($users[0]->id == $file->id)
            <hr>
            <h5 class="" style="padding-left:1em;">Documents</h5>
            <div class="row">
                  <div class="col-lg-4 col-12  p-2 text-center">
                     <label for="cor" class="col-form-label text-md-right mb-1 h3 fw-bold "> Certificate of Registration</label>
                     <center><img class="img-fluid rounded mx-auto d-block border p-2 " id="blah" style="height: 200px;" height="150px" src="
                        <?php if(getimagesize($file->cor) == false) {echo(asset('images/pdf.webp'));}else{echo(asset($file->cor));}?>
                        " alt="Image Unavailable"></center>
                     <a class="btn btn-outline-primary rounded-0 mt-3 " href="{{ asset($file->cor) }}" download>Click here to download file</a>
                  </div>
                  <div class="col-lg-4 col-12    p-2 text-center">
                     <label for="cog" class="col-form-label text-md-right mb-1 h3 fw-bold">Certificate of Grades</label>
                     <center><img class="img-fluid rounded mx-auto d-block  border p-2 " id="cogimage" style="height: 200px;" height="150px" src="
                        <?php if(getimagesize($file->cog) == false) {echo(asset('images/pdf.webp'));}else{echo(asset($file->cog));}?>
                        " alt="Image Unavailable"></center>
                     <a class="btn btn-outline-primary rounded-0 mt-3 " href="{{ asset($file->cog) }}" download>Click here to download file</a>
                  </div>
                  <div class="col-lg-4 col-12   p-2 text-center">
                     <label for="id" class="col-form-label text-md-right mb-1 h3 fw-bold">ID</label>
                     <center><img class="img-fluid rounded mx-auto d-block  border p-2 " id="idimage" style="height: 200px;" height="150px" src="
                        <?php if(getimagesize($file->id_) == false) {echo(asset('images/pdf.webp'));}else{echo(asset($file->id_));}?>
                        " alt="Image Unavailable"></center>
                     <a class="btn btn-outline-primary rounded-0 mt-3" download href="{{ asset($file->id_) }}" >Click here to download file</a>
                  </div>
                  @endif
                  @endforeach
            </div>
         </div>
      </div>
   </div>
</div>
@endsection




