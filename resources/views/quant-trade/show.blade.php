@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('quant-trade') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Place a New Trade</div>
@endsection

@section('content')
<quant-show :quantiq_fox="{{ $quantiqFox}}" :wallet="{{ $wallet }}" :quant_trade="{{ $quantTrade }}"></quant-show>
@endsection
