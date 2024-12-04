@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('home') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>My Strategy</div>
@endsection

@section('content')
    <my-strategies :working="{{ $working }}" :finished="{{ $finished }}"></my-strategies>
@endsection
