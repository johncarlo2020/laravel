@extends('layouts.app')

@section('content')

<div class="container pt-4 pt-lg-5 mt-1 mt-lg-5">
    <div class="row justify-content-center mt-1 mt-lg-5">
        <div class="col-md-8 col-lg-6">
            <div class="verifyEmailContainer shadow-sm  mb-5 bg-white rounded">
                <div class="backgroundEmail  rounded">
                   <img src=" {{ asset('images/emailsent.jpg') }}" alt="verification sent">
                </div>
                <div class="divmessage p-3 text-center px-5 py-4 pb-5">
                    <div class="headtextEmail  h3 fw-bold">{{ __('Verify Your Email Address') }}</div>
                    @if (session('resent'))
                        <p class="text-success h5" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </p>
                    @endif
                        <p>
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email.') }}
                        </p>
                        <p>
                            {{ __('click here to request another') }}
                        </p>

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn  px-4 py-1  rounded-pill btn-success">Resend</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
