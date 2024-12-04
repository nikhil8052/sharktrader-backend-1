@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('user-menu') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Payment Password</div>
@endsection

@section('content')
    @if(session()->has('success') || session()->has('error') )
        <toast-dynamic :message="'{{ session()->get('success') }}'"
                       :error="'{{ session()->get('error') }}'"></toast-dynamic>
    @endif
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="card-background let-payment-password-page">
                <div class="card-body ">
                    <form method="POST" action="{{ route('home.paymentPassword.get') }}">
                        @csrf
                        <div class="row mb-1">
                            <h3 class="form-title text-center text-white">Set Payment Password</h3>
                        </div>
                        @error('newPassword')
                        <span style="color:red;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        <hr>
                        @enderror
                        @error('repeatPassword')
                        <span style="color:red;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        <hr>
                        @enderror
                        @error('one_time_password')
                        <span style="color:red;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        <hr>
                        @enderror

                        @error('verificationCode')
                        <span style="color:red;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <payment-password
                            :paymentpassword ="'{{ $paymentPassword }}'"
                            ></payment-password>

                        <div class="mb-3">
                            @include('includes.2fa')
                        </div>


                        <div class="row mb-2">
<!--                            <div class="col-12 m-auto text-center">
                                <button type="submit" class="menu-button p-2 w-50">
                                    {{ __('Set Password') }}
                                </button>
                            </div>-->
                            <button class="button-14" type="submit" role="button">
                                    <span class="text">
                                        {{ __('Set Password') }}
                                    </span>
                                <span class="button-14-background blue"></span>
                                <!-- mask-border fallback -->
                                <svg style="position: absolute;" width="0" height="0">
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
@endsection

