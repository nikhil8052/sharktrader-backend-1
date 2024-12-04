@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('home') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Quant Trade</div>
@endsection

@section('content')
    <div class="container d-flex flex-wrap mt-3">
        @foreach($quants as $quant)
            <a href="{{ route('quant-trade.show', ['quantTrade' => $quant])}}"
               class="sectionnn p-1 m-1 text-decoration-none" style="width: 100%;overflow: initial;">
                <div class="p-2 d-flex justify-content-between align-items-center align-content-center">
                    <div class="d-flex justify-content-start align-items-center gap-2 w-100">
                       <img width="50" height="50" src="https://neospide.techhelpinfotech.com/images/clock-c3.png" alt="timer" class="let-clock"/>
					   {{--<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 50 50" viewBox="0 0 50 50" width="50" height="50"><path fill="#ffc107" d="M32.1418,10.4986H17.8582v-4.64C17.8582,1,22.6818,1,25.0004,1c2.3178,0,7.1414,0,7.1414,4.8586V10.4986z
		 M19.3806,8.9762h11.2388V5.8586c0-2.4635-1.4704-3.3362-5.619-3.3362c-4.1494,0-5.6198,0.8727-5.6198,3.3362V8.9762z" class="color666466 svgShape"></path><rect width="2.254" height="4.042" x="36.022" y="10.408" fill="#ffbf66" transform="rotate(46.33 37.15 12.428)" class="colorEEC06E svgShape"></rect><path fill="#43ffff" d="M41.6748,14.5573l-6.739-6.7001c1.853-1.8638,4.8617-1.8725,6.7255-0.0196
		C43.5191,9.6847,43.5278,12.6935,41.6748,14.5573z" class="colorFBD178 svgShape"></path><rect width="4.042" height="2.254" x="10.823" y="11.302" fill="#ffbf66" transform="rotate(43.672 12.845 12.429)" class="colorEEC06E svgShape"></rect><path fill="#43ffff" d="M8.318,14.5573l6.739-6.7001c-1.853-1.8638-4.8617-1.8725-6.7255-0.0196
		C6.4737,9.6847,6.465,12.6935,8.318,14.5573z" class="colorFBD178 svgShape"></path><polygon fill="#ffbf66" points="41.261 49 36.434 38.863 31.237 42.312 36.882 49" class="colorCCCBCB svgShape"></polygon><polygon fill="#ffbf66" points="8.739 49 13.566 38.863 18.763 42.312 13.118 49" class="colorCCCBCB svgShape"></polygon><path fill="#4effff" d="M43.421,26.6297c0,10.1697-8.2515,18.421-18.4211,18.421S6.579,36.7994,6.579,26.6297
		c0-10.1849,8.2514-18.421,18.421-18.421S43.421,16.4448,43.421,26.6297z" class="color72B0E0 svgShape"></path><path fill="#ffffff" d="M24.9995,42.3448c-8.6672,0-15.7188-7.0521-15.7188-15.7193s7.0516-15.7184,15.7188-15.7184
		c8.6676,0,15.7193,7.0512,15.7193,15.7184S33.6672,42.3448,24.9995,42.3448z" class="colorFFF svgShape"></path><rect width=".901" height="2.646" x="24.549" y="11.734" fill="#919191" class="color919191 svgShape"></rect><rect width=".901" height="2.646" x="24.549" y="38.873" fill="#919191" class="color919191 svgShape"></rect><rect width="2.646" height=".901" x="16.892" y="14.424" fill="#919191" transform="rotate(60 18.215 14.874)" class="color919191 svgShape">
		</rect><rect width="2.646" height=".901" x="30.462" y="37.927" fill="#919191" transform="rotate(60 31.785 38.376)" class="color919191 svgShape"></rect><rect width="2.646" height=".901" x="11.925" y="19.391" fill="#919191" transform="rotate(30 13.25 19.843)" class="color919191 svgShape"></rect><rect width="2.646" height=".901" x="35.428" y="32.96" fill="#919191" transform="rotate(30 36.755 33.412)" class="color919191 svgShape"></rect><rect width="2.646" height=".901" x="10.107" 
		y="26.176" fill="#919191" class="color919191 svgShape"></rect><rect width="2.646" height=".901" x="37.246" y="26.176" fill="#919191" class="color919191 svgShape"></rect><rect width=".901" height="2.646" x="12.798" y="32.088" fill="#919191" transform="rotate(59.979 13.249 33.411)" class="color919191 svgShape"></rect><rect width=".901" height="2.646" x="36.301" y="18.519" fill="#919191" transform="rotate(59.979 36.753 19.842)" class="color919191 svgShape"></rect><rect width=".901" 
		height="2.646" x="17.764" y="37.054" fill="#919191" transform="rotate(29.991 18.214 38.38)" class="color919191 svgShape"></rect><rect width=".901" height="2.646" x="31.334" y="13.552" fill="#919191" transform="rotate(29.991 31.785 14.877)" class="color919191 svgShape"></rect><polygon fill="#ef4a81" points="29.386 23.799 26.279 26.605 25.359 25.684 28.164 22.577 30.48 21.479" class="colorEF4C4A svgShape"></polygon><polygon fill="#ef4a81" points="24.143 26.121 24.143 27.68 16.446 27.933 13.553 26.905 16.446 25.869" class="colorEF4C4A svgShape"></polygon><circle cx="25" cy="26.626" r="1.938" fill="#ff6699" class="colorF06562 svgShape"></circle></svg>

					   --}}

                        <div class="d-flex align-items-start justify-content-between w-100 flex-column">

                            <div class="d-flex w-100 justify-content-between">
                                <div class="d-flex flex-column gap-2">
                                    <span>Cycle:</span>
{{--                                    <h6 class="mb-0">Smart coin selection</h6>--}}
                                    <span>Minimum amount:</span>
                                </div>
                                <div class="d-flex flex-column gap-2 justify-content-end align-items-end">
                                <span class="fw-bold float-end">

                                    @if($quant->duration > 24)
                                        {{$quant->duration / 24 }}Days
                                    @elseif($quant->duration == 24)
                                        1 Day
                                    @else
                                        {{ $quant->duration }}Hours
                                    @endif
                                </span>
<!--                                    <svg class="opacity-0" xmlns="http://www.w3.org/2000/svg" fill="#4EFFFF" width="20"  viewBox="0 0 16 16">
                                        <path d="M0 14h16v2H0v-2zm8.5-8l4-4H11V0h5v5h-2V3.5L9.5 8l-1 1-2-2-5 5L0 10.5 6.5 4 8 5.5l.5.5z" fill-rule="evenodd"/>
                                    </svg>-->
                                    <span class="fw-bold text-warning">20 USDT</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
