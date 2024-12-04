@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('user-menu') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>User Guide: Tutorials</div>
@endsection

@section('content')
    <div class=" d-flex justify-content-between flex-column p-3">
       <div class="sectionnn mb-2 row">
           <h6 class="text-center">Driving Transformation: Introducing SpiderWeb</h6>

{{--        <iframe width="100" height="250" src="https://www.youtube.com/embed/7YK4wmvUP0k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
{{--           <iframe width="560" height="315" src="https://www.youtube.com/embed/cbDL0T2vqWA?si=5XRq1DF8NTdWWOkz&autoplay=1" title="SpiderWeb's Introduction" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
           <iframe width="560" height="315" src="https://www.youtube.com/embed/eIKD_J-_b0w?si=jF5SW918SPlCXB0i&autoplay=1" title="SpiderWeb's Introduction" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
       </div>

        <div class="sectionnn mb-2 row">
           <h6 class="text-center">SW Tutorial on how to buy USDT on ByBit Exchange</h6>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/IIpBVItglL0?si=uRXdIOhiP3PaRnAS" title="SpiderWeb's Introduction" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
       </div>
    </div>
@endsection

