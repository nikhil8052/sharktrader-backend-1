@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('user-menu') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>My Wallet</div>
@endsection

@section('content')
    <div class="container let-my-wallet-page">
        <div class="text-center">
            <h5 class="text-white px-2 mb-0">
                Balance
            </h5>
            <h4>
                {{ $wallet->amount }}
                <img src="/images/Tether-USDT-icon.webp" width="25" alt="USDT">

            </h4>
        </div>

        @if(session()->has('success') || session()->has('error') )
            <toast-dynamic :message="'{{ session()->get('success') }}'"
                           :error="'{{ session()->get('error') }}'"></toast-dynamic>
        @endif

        <div class="d-flex justify-content-between align-items-center flex-column">
            <form method="POST" action="{{route('wallet.update', $wallet)}}"
                  class="card-background w-100 mt-2 p-2">
                @csrf
                @method('PATCH')
                <div class="mb-3 ">
                    <label for="address" class="col-12 col-form-label text-white">Wallet Address</label>
                    <div class="webflow-style-input">
                        <input type="text" value="{{ old('address', $wallet->address) }}" placeholder="Please enter your wallet address" class=""
                               id="address" name="address">
                    </div>
                    <div id="address"  class="form-text ">Make sure address matches wallet
                        type
                    </div>
                    @error('address')
                    <div style="color: red;" class="form-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="col-12 col-form-label text-white">Select the wallet type below</label>
                    <div class="webflow-style-input select">
                        <select class="input-background" id="type" name="type"
                                aria-label="Default select example">
                            <option {{ old('type', $wallet->type) == "trc20/usdt" ? 'selected' : '' }} value="trc20/usdt">
                                TRC20
                            </option>
                            <option {{ old('type', $wallet->type) == "bep20/usdt" ? 'selected' : '' }} value="bep20/usdt">
                                BEP20
                            </option>
                        </select>
                    </div>
                    @error('type')
                    <div style="color: red;" class="form-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    @include('includes.2fa')
                </div>
{{--                <button type="submit" class="menu-button w-100 my-4">Submit</button>--}}
                <div class="row">
                    <button class="button-14" type="submit" role="button">
                                        <span class="text">
                                        {{ __('Submit') }}
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
            </form>
        </div>

    </div>
@endsection
<script>
    function myFunction(code) {
        let text = document.getElementById("text");
        text.innerText = "Copied"
        text.classList.add("text-success")
        navigator.clipboard.writeText(code);
    }
</script>
