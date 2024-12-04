@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('list-strategies') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Strategy Details</div>
@endsection

@section('content')
    <div class="container">
        <h3 class="sectionnn p-1 my-3 text-center"> {{$strategy->name}} </h3>
        <div class="sectionnn p-3 mb-2 let-post" style='line-height: 30px'> <p>Posted by :</p> <p><small>{{$strategy->posted_by }}</small></p></div>
        <div class="sectionnn "> {!! $strategy->details !!}</div>
    </div>
@endsection
<script>

</script>
