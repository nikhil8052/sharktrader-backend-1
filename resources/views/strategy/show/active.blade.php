@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{url()->previous()}}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Active Strategy</div>
@endsection

@section('content')
    <active :created="{{ json_encode($created) }}" :reward="{{ $reward }}" :strategy="{{ $strategy}}" :reward_amount='"{{ config('app.reward_amount') }}"'></active>
@endsection

@section('style')
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
@endsection
