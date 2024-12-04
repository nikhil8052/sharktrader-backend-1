@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('user-menu') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Change Password</div>
@endsection

@section('content')
    @if(session()->has('success') || session()->has('error') )
        <toast-dynamic :message="'{{ session()->get('success') }}'"
                       :error="'{{ session()->get('error') }}'"></toast-dynamic>
    @endif
    <div class="container mt-4 let-change-password">
        <div class="row justify-content-center">
            <div class="card-background p-2 bg-fade-dark">
                <div class="card-body ">
                    <form method="POST" action="{{ route('home.changePassword.store') }}">
                        @csrf
                        <!--<div class="row mb-1">
                            <h3 class="form-title text-center text-white">Change Password</h3>
                        </div>-->

                        <div class="mb-3">
                            <label for="currentPassword"
                                   class="col-12 col-form-label text-white">{{ __('Current Password') }}</label>

                            <div class="col-12">
                                <div class="webflow-style-input">
                                    <input id="currentPassword" type="password"
                                           class=" @error('currentPassword') is-invalid @enderror"
                                           name="currentPassword" value="{{ old('currentPassword') }}" required
                                           autocomplete="currentPassword" autofocus>
                                </div>

                                @error('currentPassword')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="col-12 col-form-label text-white">{{ __('New Password') }}</label>

                            <div class="col-12">
                                <div class="webflow-style-input">
                                    <input id="newPassword" type="password"
                                           class="@error('newPassword') is-invalid @enderror"
                                           name="newPassword" value="{{ old('newPassword') }}" required
                                           autocomplete="newPassword" autofocus>
                                </div>

                                @error('newPassword')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="repeatNewPassword" class="col-12 col-form-label text-white">{{ __('Repeat New Password') }}</label>

                            <div class="col-12">
                                <div class="webflow-style-input">
                                    <input id="repeatNewPassword" type="password"
                                           class="@error('repeatNewPassword') is-invalid @enderror"
                                           name="repeatNewPassword" value="{{ old('repeatNewPassword') }}" required
                                           autocomplete="repeatNewPassword" autofocus>
                                </div>

                                @error('repeatNewPassword')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 ">
                            @include('includes.2fa')
                        </div>

                        <div class="row mb-2">
                            <div class="col-12 m-auto text-center">
                                {{--                                <button type="submit" class="menu-button p-2 w-50">--}}
                                {{--                                    {{ __('Save') }}--}}
                                {{--                                </button>--}}
                                <div class="row">
                                    <button class="button-14" type="submit" role="button">
                                        <span class="text">
                                        {{ __('Set Password') }}
                                    </span>
                                        <span class="button-14-background blue">

                                        </span>
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
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

