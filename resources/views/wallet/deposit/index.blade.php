@extends('layouts.content-layout')

@section('previous-button')
<a href="{{ route('user-menu')}}" class="text-decoration-none text-white">
    <span class="material-icons">arrow_back_ios_new</span>
</a>
@endsection

@section('title')
<div class="text-white">Deposits</div>
@endsection

@section('content')
<div class="container let-single-deposit-page">
    <div class="text-center">
        <h5 class="text-white px-2 mb-0">
            Balance
        </h5>
        <h4>
            {{ $wallet->amount }}
            <img src="/images/Tether-USDT-icon.webp" width="25" alt="USDT">

        </h4>
    </div>
    @if($transactionExists instanceof \App\Models\Transaction)
        <a class="row text-decoration-none" href="{{ route('wallet.deposit.status', ['payment_id' => $transactionExists->payment_id]) }}">
            <button class="button-14" type="submit" role="button">
                <span class="text">
                    {{ __('Already payment request sent. Check Status Now') }}
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
        </a>
    @endif
    <div class="d-flex justify-content-between align-items-center flex-column">
        <form method="POST" action="{{ route('wallet.deposit.add') }}" class="w-100 p-2">
            @csrf
            <div class="sectionnn mb-2">
                <div class="mb-3 ">
                    <label for="withdrawalAddress" class="col-12 col-form-label text-white">Deposit method</label>
                    <div class="webflow-style-input select">
                        <select class="input-background " id="withdrawalAddress" name="withdrawalAddress" aria-label="Default select example">
                            <option value="" {{ old('withdrawalAddress') == "" ? 'selected' : '' }} selected>Select your deposit method</option>
                            <option {{ old('withdrawalAddress') == "TRC20/USDT" ? 'selected' : '' }} value="TRC20/USDT">USDT (TRC20)</option>
                            <option {{ old('withdrawalAddress') == "BSC/USDT" ? 'selected' : '' }} value="BSC/USDT">USDT (BSC/BEP20)</option>
                        </select>
                    </div>
                    @error('withdrawalAddress')
                    <div style="color: red;" class="form-error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class=" mb-3 d-flex justify-content-between flex-column align-items-start align-content-center ">
                    <label for="amount" class="col-12 col-form-label text-white">Deposit amount</label>
                    <div class="webflow-style-input">
                        <input type="number" placeholder="Enter an amount at least 20 USDT" min="1" step="any" value="{{ old('amount') }}" class="" id="amount" name="amount">
                    </div>
                    @error('amount')
                    <div style="color: red;" class="form-error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    @if(session()->has('error'))
                        <div style="color: red;" class="form-error">
                            <strong>{{ session()->get('error') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

{{--            <button type="submit" class="menu-button w-100 my-4">Submit</button>--}}
            <div class="row">
                <button class="button-14" type="submit" role="button">
                <span class="text">
                    {{ __('Submit') }}
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
            <div class="sectionnn">
                <h6>Dear {{ config('app.name') }} User</h6>
                <p> 1. Use USDT to deposit ( 1 USDT = 1USD) to support BEP20/TRC20 network</p>
                <p> 2. If you use other tokens the system cannot pass the audit please contact customer service </p>

            </div>
        </form>
    </div>
</div>
@endsection
