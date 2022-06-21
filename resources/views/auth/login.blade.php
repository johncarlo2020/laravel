@extends('layouts.app')

@section('content')
<header class="header header-login d-flex justify-content-center  text-light ">

    <img src="{{ asset('images\caste.jpg') }}" alt="header-background">
    <div class="login-form ">
        <div class="login-img row d-flex justify-content-center">
            <img class="" src="{{ asset('images\logo.png') }}" alt="logo">
        </div>
        <div class="row form-holder">
            <div class="text-center">
                <h5>Log-in Form</h5>
            </div>
            <form class="" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row ">
                    <div class="col">
                        <label for="email" class=" col-form-label ">{{ __('Email Address') }}</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                            <input id="email" type="email" placeholder="example@email.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                          </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row ">
                    <div class="col">
                        <label for="password" class=" col-form-label ">{{ __('Password') }}</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                          </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-4 ">
                    <div class="">
                        <div class="form-check">
                            <input class="form-check-input rounded-0" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row px-3 mt-2">
                    <button type="submit" class="btn btn-primary rounded-0 w-100 py-2">
                        {{ __('Login') }}
                    </button>
                </div>

                <div class="row mb-0">
                    <div class=" text-center">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>

    </div>

</header>


@jquery
@toastr_js
@toastr_css
@toastr_render

@endsection