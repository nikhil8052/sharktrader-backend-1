@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('home') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>SpiderWeb</div>
@endsection
@section('info')
    <a href="{{ route('userTutorial') }}" class="text-decoration-none text-black">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
        </svg>
    </a>
@endsection

@section('content')
<shark :user="'{{ $user }}'" :present="'{{ $present }}'" :sharks="'{{ $sharks }}'"/>
@endsection
