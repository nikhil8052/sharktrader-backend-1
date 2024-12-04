@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('home') }}" class="text-decoration-none text-white">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div class="text-white">Best Exchange Rates</div>
@endsection
@section('content')
<exchange-rates :levels="{{ json_encode($levels) }}"></exchange-rates>
@endsection

