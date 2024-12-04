@extends('layouts.app')

@push('head')
    <style>
        .text-info{
            color: #ffffff !important;
        }
        .button-14{
            width: 100%;
            padding: 5px !important;
            font-size: 20px;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="glow-element opacity-70"></div>
        <div class="glow-element-img opacity-10"></div>
        <div class="row justify-content-center">
            <div class="card-background p-3">
                <div class="card-body ">
                    <div class="row mb-4">
                        <h3 class="form-title text-center text-white">Register</h3>
                    </div>
                    @push('head')
                        <script>
                            document.addEventListener("DOMContentLoaded", function(event) {

                                var counter = 59

                                function countdown(){
                                    document.querySelector("button.codeButton").innerText = "00:"+String(counter).padStart(2, '0')
                                    counter--
                                }

                                function disableButton() {
                                    var code_button = document.querySelector("button.codeButton")
                                    code_button.disabled = true;
                                    code_button.setAttribute("style", 'opacity:0.5;')

                                    const myInterval = setInterval(countdown, 1000)

                                    setTimeout(function() {

                                        counter=59
                                        clearInterval(myInterval)


                                        code_button.disabled = false;
                                        code_button.innerText = "Get Code"
                                        code_button.removeAttribute("style")
                                    }, 60000);
                                }

                                document.querySelector("button.codeButton").addEventListener("click", disableButton);

                            });
                        </script>
                    @endpush
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <sms-verification></sms-verification>

                        <div class="row mb-3">
                            <label for="referral_code" class="col-md-4 col-form-label text-md-end text-white">{{ __('Referral Code') }}</label>

                            <div class="col-md-8">
                                <input id="referral_code" type="text"
                                       placeholder="Please enter the invitation code"
                                       value="{{ $referral_code !== null ? $referral_code : old('referral_code') }}"
                                       class="input-background @error('referral_code') is-invalid @enderror"
                                       name="referral_code"
                                       autocomplete="referral_code"
                                       autofocus>

                                @error('referral_code')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-white">{{ __('Username') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text"
                                       placeholder="Please enter a user name"
                                       class="input-background @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-end text-white">{{ __('Email Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email"
                                       placeholder="Please enter your email"
                                       class="input-background @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-end text-white">{{ __('Password') }}
                            </label>

                            <div class="col-md-8">
                                <input id="password" type="password"
                                       class="input-background @error('password') is-invalid @enderror" name="password"
                                       placeholder="Please enter a password of 8-32 digits"
                                       required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex align-items-start justify-content-start gap-2 mb-3">
                            <p class="text-center text-white mb-0 w-100">Have already an account?
                                <a href="{{route('login')}}" class="fw-bold text-white text-body ">
                                    <u class="text-white"> Login here</u></a></p>
                        </div>

                        <div class="row">
                            <div class="col-12 m-auto text-center">
                                <button type="submit" class="button-14 w-100" role="button"
                                        data-v-bb202d60="">
                                    <div class="text row" data-v-bb202d60="">
                                        <div class="col-12" data-v-bb202d60="">{{ __('Register') }}</div>
                                    </div>
                                    <span class="button-14-background blue" data-v-bb202d60=""></span>
                                    <!--                <span class="button-14-border"></span>-->
                                    <!-- mask-border fallback -->
                                    <svg width="0" height="0" data-v-bb202d60=""
                                         style="position: absolute;">
                                        <filter id="remove-black-button-14"
                                                color-interpolation-filters="sRGB" data-v-bb202d60="">
                                            <feColorMatrix type="matrix" values="1 0 0 0 0
0 1 0 0 0
0 0 1 0 0
-1 -1 -1 0 1" result="black-pixels" data-v-bb202d60=""></feColorMatrix>
                                            <feComposite in="SourceGraphic" in2="black-pixels"
                                                         operator="out" data-v-bb202d60=""></feComposite>
                                        </filter>
                                    </svg>
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
