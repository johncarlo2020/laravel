@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header  bg-white h5 py-3">Upload requirements</div>

                <div class="card-body">
                {{-- <h2 class="mb-5 mt-2"> Welcome ! {{ Auth::user()->first_name }}</h2> --}}

                <form action="scholar/requirements" method="post" enctype="multipart/form-data">
                @csrf
		        @method('post')
            <div class="row  p-3 ">
                <div class="col-lg-4 col-12 border p-3">
                    <label for="cor" class="col-form-label text-md-right mb-1"> Certificate of Registration<span class="text-danger"> *</span></label>
                    <input class="form-control mb-1 btn-primary rounded-0 " type="file" name="cor[]" id="cor" accept="application/pdf,image/*"></input>
                    <small class='text-primary'><center id="corpdf">Accepted file type: PDF,jpeg only</center></small>
                    <small><center class="text-danger d-none" id="corerror">Field cannot be empty!</center></small>
                    <center><img class="img-fluid rounded mx-auto d-block d-none" id="blah" style="max-height: 200px;" height="150px" src='' alt="Image Unavailable"></center>

                </div>
                <div class="col-lg-4 col-12  border  p-3">
                    <label for="cog" class="col-form-label text-md-right mb-1">Certificate of Grades<span class="text-danger"> *</span></label>
                    <input  class="form-control mb-1 mb-1 btn-primary rounded-0 " type="file" name="cog[]" id="cog" accept="application/pdf,image/*">
                    <small class='text-primary'><center id="cogpdf">Accepted file type: PDF,jpeg only</center></small>
                    <small><center class="text-danger  d-none" id="cogerror">Field cannot be empty!</center></small>
                    <center><img class="img-fluid rounded mx-auto d-block d-none" id="cogimage" style="max-height: 200px;" height="150px" src='' alt="Image Unavailable"></center>

                </div>
                <div class="col-lg-4 col-12  border  p-3">
                    <label for="id" class="col-form-label text-md-right mb-1">ID<span class="text-danger"> *</span></label>
                    <input class="form-control mb-1 mb-1 btn-primary rounded-0 " type="file" name="id[]" id="id" accept="application/pdf,image/*">
                    <small class='text-primary'><center id="idpdf">Accepted file type: PDF,jpeg only</center></small>
                    <small><center class="text-danger  d-none" id="iderror">Field cannot be empty!</center></small>
                    <center><img class="img-fluid rounded mx-auto d-block d-none" id="idimage" style="max-height: 200px;" height="150px" src='' alt="Image Unavailable"></center>

                </div>
            </div>
            <div class="justify-content-center " >
            <div class=" pt-4 px-5 text-center" >
                        <input type="checkbox" name="checkbox"><small> I , hereby declare that the information provided is true and correct. I also understand that any willful dishonesty may render for refusal of this application </small></input>
                        <small><center class="text-danger  d-none" id="checkerror">Has to be checked</center></small>

                    </div>
            </div>
            <div class="row pb-4">
                <div class="col pt-4">
                    <center>
                    <input class="btn btn-success px-5 rounded-pill" type="button" id="submit" value="Submit">
                    <input class="btn btn-success d-none  px-5 rounded-pill" type="submit" id="submits" value="submit" >
                    </center>
                </div>
            </div>
                <button type="button" class="modalz btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" hidden>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        {{-- <h5 class="modal-title " id="exampleModalLabel">Confirm</h5> --}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center border-none py-4">
                        <h5>To make the application process go more smoothly, please double-check that all files are correct.</h5>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-success rounded-0 w-100 ">Proceed</button>
                    </div>
                    </div>
                </div>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @jquery

<script>


    cor.onchange = evt => {
        console.log('gagana');
        var mimeType=cor.files[0]['type'];
         const [file] = cor.files
         if(mimeType.split('/')[0] === 'image'){
            $('#blah').removeClass('d-none');
            $('#corerror').addClass('d-none');
            $('#corpdf').addClass('d-none');
            blah.src = URL.createObjectURL(file)
            console.log('gagana');
        }else{
            $('#blah').removeClass('d-none');
            $('#corerror').addClass('d-none');
            $('#corpdf').addClass('d-none');
            blah.src = 'images/pdf.webp';
            console.log('gagana');
        }
      }
      cog.onchange = evt => {
        console.log('gagana');
         const [file] = cog.files
         var mimeType=cog.files[0]['type'];
         if(mimeType.split('/')[0] === 'image'){
            $('#cogimage').removeClass('d-none');
            $('#cogerror').addClass('d-none');
            $('#cogpdf').addClass('d-none');
            cogimage.src = URL.createObjectURL(file)
            console.log('gagana');
         }else{
            $('#cogimage').removeClass('d-none');
            $('#cogerror').addClass('d-none');
            $('#cogpdf').addClass('d-none');
            cogimage.src = 'images/pdf.webp';
            console.log('gagana');
         }
      }
      id.onchange = evt => {
        console.log('gagana');
         const [file] = id.files
         var mimeType=id.files[0]['type'];
        if(mimeType.split('/')[0] === 'image'){
            $('#idimage').removeClass('d-none');
            $('#iderror').addClass('d-none');
            $('#idpdf').addClass('d-none');
            idimage.src = URL.createObjectURL(file)
            console.log('gagana');
            }else{
            $('#idimage').removeClass('d-none');
            $('#checkerror').addClass('d-none');
            $('#idpdf').addClass('d-none');
            idimage.src = 'images/pdf.webp';
            console.log('gagana');
            }

      }

    $("#submit").on("click", function () {
        var cog = $("#cog")[0].files.length;
        var cor = $("#cor")[0].files.length;
        var id  = $("#id")[0].files.length;

        if (cor < 1) {
            $('#corerror').removeClass('d-none');
         }else{
            $('#corerror').addClass('d-none');
         }
        if (cog < 1) {
            $('#cogerror').removeClass('d-none');
         }else{
            $('#cogerror').addClass('d-none');
         }
        if (id < 1) {
            $('#iderror').removeClass('d-none');
         }else{
            $('#iderror').addClass('d-none');
         }
        if ($('input[name="checkbox"]').is(':checked')) {
            $('#checkerror').addClass('d-none');
        }else{
             $('#checkerror').removeClass('d-none');
         }

        if(cor > 0 && cog > 0 && id > 0 && $('input[name="checkbox"]').is(':checked')){
        console.log('works');
        // $( "#submits" ).click();
        $( ".modalz" ).click();
         }else{
        console.log('di');
         }
   });


//    cor.onchange = evt => {
//     const [file] = cor.files
//     if(cor.files[0].size > 0){
//         console.log('works');
//          }
//     }




</script>


@endsection
