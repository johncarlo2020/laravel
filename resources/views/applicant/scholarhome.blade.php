@extends('layouts.app')

@section('content')
<div class="scholar-home container-fluid mt-5 d-none">
    <div class="welcome-message">
        <h1>Welcome!</h1>
        <p>Castillejos Scholarship</p>
        <h2>APPLICATION SYSTEM </h2>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('images\carosel1.png') }}" class="d-block w-100 " alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images\carosel2.jpeg') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images\carosel3.jpeg') }}" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</div>
<div class="container banner-img pl-0">
    <img src="{{ asset('images\bannerweb.jpg') }}" class=" w-100 " alt="...">
</div>
<div class="container py-3 mt-5 text-center">
    {{-- <h2>ANNOUNCEMENT</h2> --}}
    <div class="row carocel-announcement">
        <div class="col-3 bg-primary rounded py-3 px-2 text-center fw-bold text-white">
            <h5 class="pb-2 text-center border-bottom ">Announcements</h5>
            <p>June ~ 30 ~ 2022</p>
        </div>
        <div class="col-9">
            <div id="carouselIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images\285857250_1627908610927275_4788050083199744245_n.jpg') }}" class="d-block w-100 " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images\289413239_523346756141039_2035174488748246497_n.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images\vlcsnap-2022-06-29-08h13m34s362-768x432.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images\289632599_1640596916325111_8431930496924671114_n.jpg') }}" class="d-block w-100" alt="...">
                </div>
                </div>
                <button class="carousel-control-prev " type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
                </div>
            </div>
            <p class="text-muted mt-5"><i>Please visit this link for more information about Castillejos Scholarship and events at <a href="http://castillejos.com.ph/">castillejos.com.ph</a></p>

</div>
<footer class="bg-dark text-center text-light py-3">
    <p class="m-0 p-0">© 2022-2024 csas.edu.ph All rights reserved.</p>
</footer>

@endsection
