@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('wallet.withdraw.index')}}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Completed</div>
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
        width: calc(100% - 1.5rem) !important;
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
	.nodata {
		font-size: 20px !important;
		margin: 10px 0px 20px;
	}
	.mt-5.text-center img[alt="no-data"] {
    width: 100% !important;
    max-width: 150px;
}
</style>

@section('content')
    <div class="container ">
        @if(session()->has('success') || session()->has('error') )
            <toast-dynamic :message="'{{ session()->get('success') }}'" :error="'{{ session()->get('error') }}'"></toast-dynamic>
        @endif
        <div class="buttonsSelection new">
            <a href="/awaiting-withdrawals" class="relative ">Submit
                <div class="bordered {{ request()->url() == route('wallet.withdraw.index') ? 'check' : 'circle' }}">
                    @if(request()->url() == route('wallet.withdraw.index'))
                        <img class="check" src="{{ asset('images/check.png') }}">
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
            <a href="/approved-withdrawals" class="relative active">Completed
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
            <div class=" w-100">
                @if(count($approved) != 0)
                    @foreach($approved as $approvedWithdraw)
                        <a
                            href="/withdraw/{{$approvedWithdraw->id}}"
                           class="sectionnn w-100 my-1 m-0 row p-2 align-items-center  text-decoration-none ">
                            <div class="col-2">
                                <img style="width: 25px;"
                                     src="{{ asset('/images/Tether-USDT-icon.webp') }}" alt="logo">
                            </div>
                            <div class="col-7 text-center">{{ $approvedWithdraw->amount  }} USDT</div>
                            <div class="col-3 d-flex justify-content-between">
                                <span class="material-icons">done</span>
                                <svg width='24' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                    </a>
                    @endforeach
                @else
                    <div class="mt-5 text-center">
                        <img style="width: 170px;" src="{{asset('/images/no-data-a.png')}}" alt="no-data">
                        <div class="text-white nodata">No data yet</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
