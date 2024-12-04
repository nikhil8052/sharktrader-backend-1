

@extends('layouts.app')

@section('content')
<div class="card-background  text-sm p-3 text-white info bg-fade-dark">
            @if (session('resent'))
                <div class="mb-4 font-medium text-sm">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @else
                {{ __('Thanks for signing up! Before getting started, please verify your email address by clicking on the link we emailed to you.') }}
            @endif
        </div>

        <div style="max-width: 90%" class="mt-2 flex items-center justify-between mx-auto">
            <form method="POST" action="{{ route('verification.send') }}" class="mb-0">
                @csrf
                <div class="row">
                    <button class="button-14" type="submit" role="button" style="margin-bottom: 0 !important;">
                        <span class="text">
                            {{ __('Resend Verification Email') }}
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

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="row">
                    <button class="button-14" type="submit" role="button">
                        <span class="text">
                            {{ __('Log out') }}
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
@endsection
<style>
    .background-img{
        {{--background: url("{{asset('images/home-bg.png')}}");--}}
        width: 100%;
    }

    div#nav-bottom {
        display: none !important;
    }
</style>
