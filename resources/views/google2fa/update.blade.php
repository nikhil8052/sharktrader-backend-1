@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('home') }}" class="text-decoration-none text-white">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div class="text-white">Setup Your OTP</div>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="sectionnn let-set-up-otp-page">
                <h4 class="card-heading text-center mt-4">Set up OTP</h4>

                <div class="card-body" style="text-align: center;">
                    <form class="form-horizontal" method="POST" action="{{ route('update.2fa') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="google2fa_secret" value="{{ $secret }}">
                        <p>Set up your two factor authentication by scanning the barcode below. Alternatively, you can use the code <strong>{{ $secret }}</strong></p>
                        <div class="mb-3">
                            {!! $QR_Image !!}
                        </div>
                        <p>You must set up your Google Authenticator app before continuing. You will be unable to login otherwise</p>
                        <div class="row">
{{--                            <button type="submit" href="{{ route('update.2fa') }}" class="menu-button w-100 my-4">Complete Registration</button>--}}
                            <button type="submit" href="{{ route('update.2fa') }}" class="button-14 w-full" role="button">
                                <div class="text row">
                                    <div class="col-12">Complete Registration</div>
                                </div>
                                <span class="button-14-background blue"></span>
                                <!--                <span class="button-14-border"></span>-->
                                <!-- mask-border fallback -->
                                <svg width="0" height="0"
                                     style="position: absolute;">
                                    <filter id="remove-black-button-14" color-interpolation-filters="sRGB">
                                        <feColorMatrix type="matrix" values="1 0 0 0 0
                                                            0 1 0 0 0
                                                            0 0 1 0 0
                                                            -1 -1 -1 0 1" result="black-pixels"></feColorMatrix>
                                        <feComposite in="SourceGraphic" in2="black-pixels" operator="out"></feComposite>
                                    </filter>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
