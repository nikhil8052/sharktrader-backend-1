@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('user-menu')}}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Withdraw</div>
@endsection

<style>

.active {
    border-radius: 25px;
    background-color: #424242;
    font-weight: bold;
}
.buttonsSelection>a {
    position: relative;
    height: 38px;
    line-height: 38px;
    width: 33%;
    display: inline-block;
    /*border-radius: 25px;*/
    border-radius: 0px;
    text-align: center;
    text-decoration: none;
    font-weight: bold;
    font-size: 1rem;
    color: #10cef2;
}
.buttonsSelection .active{
    background: none !important;
    border-radius: 0px !important;
    font-weight: bold;
    box-shadow: none;
    border-bottom: 1px solid #fff;

}
.buttonsSelection>a:hover {
    color: #10cef2;
}
.buttonsSelection>a div.bordered {
    position: absolute;
     text-align: center;
     margin: auto;
    right: 50%;
    transform: translate(40%, 0%);
    bottom: -7px;
    border-radius: 50%;
    background-color: rgb(44, 44, 44);
}
.buttonsSelection>a div.bordered.circle {
    bottom: -4px;
}
.buttonsSelection>a div.bordered img {
    width: 14px;
}
.buttonsSelection>a div.bordered.circle img {
    width: 8px;
}
.buttonsSelection{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    /*background: #fffefe;*/
    height: 40px;
    margin-top: 25px;
    /*width: calc(100% - 1.5rem) !important;*/
    margin-left: auto;
    margin-right: auto;
    /*border: 1px solid;*/
    /*box-shadow: rgba(0, 0, 0, 0.3) 0px 0px 12px 0px;*/
    /*border-radius: 25px;*/
    box-shadow: none !important;

}
.button-select {
    font-size: 10px;
}
</style>
@section('content')
<div class="container let-withdraw-single-page">
    @if(session()->has('success') || session()->has('error') )
    <toast-dynamic :message="'{{ session()->get('success') }}'" :error="'{{ session()->get('error') }}'"></toast-dynamic>
    @endif
    <div class="buttonsSelection new">
        <a href="/awaiting-withdrawals" class="relative active">Submit
            <div class="bordered {{ request()->url() == route('wallet.withdraw.index') ? 'check' : 'circle' }}">
                @if(request()->url() == route('wallet.withdraw.index'))
                    <img class="check" src="{{ asset('images/check-ss.png') }}">
                @else
                    <img class="circle" src="{{ asset('images/new-moon.png') }}">
                @endif
            </div>
        </a>
        <a href="/awaiting-withdrawals" class="relative ">
            Processing
            <div class="bordered {{ request()->url() == route('withdraw.awaiting') ? 'check' : 'circle' }}">
                @if(request()->url() == route('withdraw.awaiting'))
                    <img class="check" src="{{ asset('images/check.png') }}">
                @else
                    <img class="circle" src="{{ asset('images/new-moon.png') }}">
                @endif
            </div>
        </a>
        <a href="/approved-withdrawals" class="relative ">Completed
            <div class="bordered {{ request()->url() == route('withdraw.approved') ? 'check' : 'circle' }}">
                @if(request()->url() == route('withdraw.approved'))
                    <img class="check" src="{{ asset('images/check.png') }}">
                @else
                    <img class="circle" src="{{ asset('images/new-moon.png') }}">
                @endif
            </div>
        </a>
    </div>

    <div class="d-flex justify-content-between align-items-center flex-column">
        <form action="{{ route('wallet.withdraw.funds') }}" method="POST" class="w-100 mt-2 p-2">
            @csrf
<!--            <div class="sectionnn card-bottom pt-3 px-3 mb-2">
                <div class="d-flex">
                    <div class="d-flex flex-column justify-content-center pe-2">
                        <img style="width: 25px;" src="{{ asset('/images/Tether-USDT-icon.webp') }}" alt="logo">
                    </div>
                    <div class="d-flex flex-column">
                        <span>Balance amount</span>
                        <span><b>{{ $wallet->amount }}</b></span>
                    </div>
                    <div class="m-auto me-0">
                        <img style="width: 35px;height:35px" src="{{ asset('/images/deposit.png') }}" alt="logo">
                    </div>
                </div>
                @error('balance')
                <div style="color: red;" class="form-error">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>-->
            <div class="sectionnn mb-2 bg-fade-dark ">
                <div class="mb-3 transfer-images-icons">
                    <label for="withdrawalAddress" class="col-12 col-form-label text-white"><img src="/images/withrow-address.png" alt="icon-image" width="25">Withdraw address</label>
                    <div class="webflow-style-input">
                        <input type="text" readonly value="{{ $wallet->address }}" class="" name="withdrawalAddress" id="withdrawalAddress">
                    </div>
                    @error('withdrawalAddress')
                    <div style="color: red;" class="form-error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="mb-3 transfer-images-icons let-main-popup">
                    <label for="amount" class="col-12 col-form-label text-white"><img src="/images/withdraws-amount.png" alt="icon-image" width="25">Withdrawal amount</label>
                    <div class="webflow-style-input let-withrow-amount-ss">
                        <input type="number" placeholder="Enter an amount at least 10 USDT" value="{{ old('amount') }}" min="1" step="any" class="" id="amount" name="amount">
						<span class="let-i">i</span>
                    </div>
                    <div class="form-text text-description mx-3 text-danger fw-bold lt-popup-text" ><p>For BEP20/BSC network 0.3% fee is applied & $2 for TRC20/Tron Network</p></div>
                    @error('amount')
                    <div style="color: red;" class="form-error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="mb-3 transfer-images-icons">
                    <label for="payment_password" class="col-12 col-form-label text-white {{ (auth()->user()->payment_password == null || auth()->user()->payment_password == '') ? 'd-flex justify-content-around' : '' }}">
                        <span><img src="/images/Payment-Password.png" alt="icon-image" width="25"> Payment Password</span>
                        @if(auth()->user()->payment_password == null || auth()->user()->payment_password == '')
                            <div class="d-flex gap-2" style="font-size: 0.75rem">
                                <a href="{{ route('home.paymentPassword') }}" class="btn btn-danger d-flex">
                                    <span>Set Payment Password</span>
                                    <span class="material-icons" style="font-size: 11px; width: 10px; line-height: 20px;">arrow_forward_ios_new</span>
                                </a>
                            </div>
                        @endif
                    </label>
                    <div class="webflow-style-input">
                        <input type="password" value="{{ old('payment_password') }}" class="" name="payment_password" id="payment_password">
                    </div>

                    <div class="form-text text-description mx-3 text-danger fw-bold"></div>
                    @error('payment_password')
                    <div style="color: red;" class="form-error">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <button class="button-14" type="submit" role="button">
                                        <span class="text">
                                        {{ __('Withdraw') }}
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
