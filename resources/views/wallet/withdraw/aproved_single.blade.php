@extends('layouts.content-layout')

@section('previous-button')
<a href="/approved-withdrawals" class="text-decoration-none ">
    <span class="material-icons">arrow_back_ios_new</span>
</a>
@endsection

@section('title')
<div>Withdraw</div>
@endsection

@section('content')
<div class="container ">
    <div class="d-flex justify-content-between align-items-center flex-column">
        <div class=" w-100">
            @if($withdraw)
            <div class="sectionnn w-100 my-1 m-0 p-2">
                <div style="border-bottom: 1px solid #63626242;" class="row p-2 align-items-center text-decoration-none ">
                    <div class="col-4">
                        Status
                    </div>
                    <div class="col-8 ">{{ $withdraw->status  }}</div>
                </div>
                <div style="border-bottom: 1px solid #63626242;" class="row p-2 align-items-center text-decoration-none ">
                    <div class="col-4">
                        Amount
                    </div>
                    <div class="col-8 ">{{ $withdraw->amount  }} USDT</div>
                </div>
                <div style="border-bottom: 1px solid #63626242;" class="row p-2 align-items-center text-decoration-none ">
                    <div class="col-4">
                        Address
                    </div>
                    <div class="col-8 " style="overflow: auto;line-height: 35px;">{{ $wallet->address  }}</div>
                </div>
                <div style="border-bottom: 1px solid #63626242;" class="row p-2 align-items-center text-decoration-none ">
                    <div class="col-4">
                        Wallet Type
                    </div>
                    <div class="col-8 ">{{ $wallet->type }}</div>
                </div>
                <div style="border-bottom: 1px solid #63626242;" class="row p-2 align-items-center text-decoration-none ">
                    <div class="col-4">
                        Approved Time
                    </div>
                    <div class="col-8 ">{{ \Carbon\Carbon::parse($withdraw->updated_at) }}</div>
                </div>
            </div>
            @else
            <div class="mt-5 text-center">
                <img style="width: 170px;" src="{{asset('/images/no-data.png')}}" alt="no-data">
                <div>Could not find your withdraw details</div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection