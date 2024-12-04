@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{url()->previous()}}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div> Finished Strategy</div>
@endsection

@section('content')
    <finished :data="{{ json_encode($earnings) }}" :created="{{ json_encode($created) }}" :strategy="{{ $strategy}}"></finished>
@endsection
