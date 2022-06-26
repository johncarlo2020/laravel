@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header  bg-white h5 py-3">Upload requirements</div>

                <div class="card-body">
                {{-- <h2 class="mb-5 mt-2"> Welcome ! {{ Auth::user()->first_name }}</h2> --}}
                    <input id="one" value="0" type="text" hidden>
                    <input id="two" value="0" type="text" hidden>
                    <input id="three" value="0" type="text" hidden>
                    <input id="four" value="0" type="text" hidden>
                <form action="scholar/requirements" method="post" enctype="multipart/form-data">
                @csrf
		        @method('post')
                <div class="row p-3 ">
                <div class="col border p-3">
                    <label for="cor" class="col-form-label text-md-right mb-1"> Certificate of Registration<span class="text-danger"> *</span></label>
                    <input class="form-control mb-1 btn-primary rounded-0 " type="file" name="cor[]" id="cor" accept="application/pdf,image/*"></input>
                    <small class='text-primary'><center id="corpdf">Accepted file type: PDF,jpeg only</center></small>
                    <small><center class="text-danger d-none" id="corerror">Field cannot be empty!</center></small>
                    <small><center class="text-primary " id="corz">File size must be less than 5mb!</center></small>
                    <center><img class="img-fluid rounded mx-auto d-block d-none" id="blah" style="max-height: 200px;" height="150px" src='' alt="Image Unavailable"></center>
                </div>
                <div class="col border p-3">
                    <label for="cog" class="col-form-label text-md-right mb-1">Certificate of Grades<span class="text-danger"> *</span></label>
                    <input  class="form-control mb-1 mb-1 btn-primary rounded-0 " type="file" name="cog[]" id="cog" accept="application/pdf,image/*">
                    <small class='text-primary'><center id="cogpdf">Accepted file type: PDF,jpeg only</center></small>
                    <small><center class="text-danger  d-none" id="cogerror">Field cannot be empty!</center></small>
                    <small><center class="text-primary " id="cogz">File size must be less than 5mb!</center></small>
                    <center><img class="img-fluid rounded mx-auto d-block d-none" id="cogimage" style="max-height: 200px;" height="150px" src='' alt="Image Unavailable"></center>
                </div>
                <div class="row p-3 ">
                <div class="col-6 border p-3">
                    <label for="id" class="col-form-label text-md-right mb-1">ID<span class="text-danger"> *</span></label>
                    <input class="form-control mb-1 mb-1 btn-primary rounded-0 " type="file" name="id[]" id="id" accept="application/pdf,image/*">
                    <small class='text-primary'><center id="idpdf">Accepted file type: PDF,jpeg only</center></small>
                    <small><center class="text-danger  d-none" id="iderror">Field cannot be empty!</center></small>
                    <small><center class="text-primary " id="idz">File size must be less than 5mb!</center></small>
                    <center><img class="img-fluid rounded mx-auto d-block d-none" id="idimage" style="max-height: 200px;" height="150px" src='' alt="Image Unavailable"></center>
                </div>
                <div class="col-6 border p-3">
                    <label for="id" class="col-form-label text-md-right mb-1">Profile Picture<span class="text-danger"> *</span></label>
                    <input class="form-control mb-1 mb-1 btn-primary rounded-0" type="file" name="pic[]" id="pic" accept="image/*">
                    <small class='text-primary'><center id="picpdf">Accepted file type: Image only</center></small>
                    <small><center class="text-danger  d-none" id="picerror">Field cannot be empty!</center></small>
                    <small><center class="text-primary " id="picz">File size must be less than 5mb!</center></small>
                    <center><img class="img-fluid rounded mx-auto d-block d-none" id="picimage" style="max-height: 200px;" height="150px" src='' alt="Image Unavailable"></center>
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

    pic.onchange = evt => {
        console.log('gagana');

        const [filez] = pic.files
        console.log(pic.files[0].size);
        if(pic.files[0].size < 5000000){
            console.log('maliit');
            $('#four').attr('value', '0');
            // $('#corz').addClass('d-none');
        }else{
            console.log('malaki');
            $('#four').attr('value', '1');
            // $('#corz').removeClass('d-none');
        }

        var mimeType=pic.files[0]['type'];
         const [file] = pic.files
         if(mimeType.split('/')[0] === 'image'){
            $('#picimage').removeClass('d-none');
            $('#picpdf').addClass('d-none');
            $('#corpdf').addClass('d-none');
            picimage.src = URL.createObjectURL(file)
            console.log('gagana');
        }else{
            $('#picimage').removeClass('d-none');
            $('#picerror').addClass('d-none');
            $('#picpdf').addClass('d-none');
            picimage.src = 'images/pdf.webp';
            console.log('gagana');
        }
      }



      cor.onchange = evt => {
        console.log('gagana');

        const [filez] = cor.files
        console.log(cor.files[0].size);
        if(cor.files[0].size < 5000000){
            console.log('maliit');
            $('#one').attr('value', '0');
            // $('#corz').addClass('d-none');
        }else{
            console.log('malaki');
            $('#one').attr('value', '1');
            // $('#corz').removeClass('d-none');
        }

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

        const [filez] = cog.files
        console.log(cog.files[0].size);
        if(cog.files[0].size < 5000000){
            console.log('maliit');
            // $('#cogz').addClass('d-none');
            $('#two').attr('value', '0');
        }else{
            console.log('malaki');
            $('#two').attr('value', '1');
            // $('#cogz').removeClass('d-none');
        }

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

        const [filez] = id.files
        console.log(id.files[0].size);
        if(id.files[0].size < 5000000){
            console.log('maliit');
            $('#three').attr('value', '0');
            // $('#idz').addClass('d-none');
        }else{
            console.log('malaki');
            // $('#idz').removeClass('d-none');
            $('#three').attr('value', '1');
        }

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
        var pic  = $("#pic")[0].files.length;
        var one  = $('#one').val();
        var two = $('#two').val();
        var three = $('#three').val();
        var four = $('#four').val();

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
         if (pic < 1) {
            $('#picerror').removeClass('d-none');
         }else{
            $('#picerror').addClass('d-none');
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
        if(cor > 0 && cog > 0 && pic > 0 && id > 0 && $('input[name="checkbox"]').is(':checked') && one == 0 && two == 0 && three == 0 && four == 0){
        console.log('works');
        $( ".modalz" ).click();
         }else{
        console.log('di');
         }
   });



</script>


@endsection
