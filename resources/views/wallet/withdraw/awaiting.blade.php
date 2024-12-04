@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('wallet.withdraw.index') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection


@section('title')
    <div>Processing</div>
@endsection



<style>
    .active {
        border-radius: 25px;
        background-color: #424242;
        font-weight: bold;
    }
    .buttonsSelection>a {
        position: relative;
        height: 38px;
        line-height: 38px;
        width: 33%;
        display: inline-block;
        /*border-radius: 25px;*/
        border-radius: 0px;
        text-align: center;
        text-decoration: none;
        font-weight: bold;
        color: #10cef2;
    }
    .buttonsSelection .active{
        background: none !important;
        border-radius: 0px !important;
        font-weight: bold;
        box-shadow: none;
        border-bottom: 1px solid #fff;

    }
    .buttonsSelection>a:hover {
        color: #10cef2;
    }
    .buttonsSelection>a div.bordered {
        position: absolute;
        text-align: center;
        margin: auto;
        right: 50%;
        transform: translate(40%, 0%);
        bottom: -8px;
        background-color: rgb(44, 44, 44);
    }
    .buttonsSelection>a div.bordered.circle {
        bottom: -4px;
    }
    .buttonsSelection>a div.bordered img {
        width: 14px;
    }
    .buttonsSelection>a div.bordered.circle img {
        width: 8px;
    }
    .buttonsSelection{
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        /*background: #fffefe;*/
        height: 40px;
        margin-top: 25px;
        width: calc(100% - 1.5rem) !important;
        margin-left: auto;
        margin-right: auto;
        /*border: 1px solid;*/
        /*box-shadow: rgba(0, 0, 0, 0.3) 0px 0px 12px 0px;*/
        /*border-radius: 25px;*/
        box-shadow: none !important;

    }
    .button-select {
        font-size: 10px;
    }
	.nodata {
		font-size: 20px !important;
		margin: 10px 0px 20px;
	}
	.mt-5.text-center img[alt="no-data"] {
    width: 100% !important;
    max-width: 150px;
}
</style>
@section('content')
    <div class="container ">
        @if(session()->has('success') || session()->has('error') )
            <toast-dynamic :message="'{{ session()->get('success') }}'" :error="'{{ session()->get('error') }}'"></toast-dynamic>
        @endif
        <div class="buttonsSelection new">
            <a href="{{ route('wallet.withdraw.index') }}" class="relative ">
                Submit
                <div class="bordered {{ request()->url() == route('wallet.withdraw.index') ? 'check' : 'circle' }}">
                    @if(request()->url() == route('wallet.withdraw.index'))
                        <img class="check" src="{{ asset('images/check.png') }}">
                    @else
                        <img class="circle" src="{{ asset('images/new-moon.png') }}">
                    @endif
                </div>
            </a>
            <a href="{{ route('withdraw.awaiting') }}" class="relative active">
                Processing
                <div class="bordered {{ request()->url() == route('withdraw.awaiting') ? 'check' : 'circle' }}">
                    @if(request()->url() == route('withdraw.awaiting'))
                        <img class="check" src="{{ asset('images/check.png') }}">
                    @else
                        <img class="circle" src="{{ asset('images/new-moon.png') }}">
                    @endif
                </div>
            </a>
            <a href="{{ route('withdraw.approved') }}" class="relative ">Completed
                <div class="bordered {{ request()->url() == route('withdraw.approved') ? 'check' : 'circle' }}">
                    @if(request()->url() == route('withdraw.approved'))
                        <img class="check" src="{{ asset('images/check.png') }}">
                    @else
                        <img class="circle" src="{{ asset('images/new-moon.png') }}">
                    @endif
                </div>
            </a>
        </div>
        <div class="d-flex justify-content-between align-items-center flex-column">
            <div class=" w-100">
                @if(count($awaiting) != 0)
                    @foreach($awaiting as $awaitingWithdraw)
                        <div class="sectionnn w-100 my-1 m-0 row p-2 align-items-center  text-decoration-none">
                            <div class="col-2">
                                <img style="width: 25px;"
                                     src="{{ asset('/images/Tether-USDT-icon.webp') }}" alt="logo">
                            </div>
                            <div class="col-8 text-app text-center" style="font-size: 1.2rem">{{ $awaitingWithdraw->amount  }} USDT</div>
                            <div class="col-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="25" height="25"><path fill="#f1b974" d="M12.82 18.62S25.06 7.32 37.79 8.44c0 0-3.28 4.7 0 6.23 1.24.52 6.6 1.55 5.42-5.53 0 0 13.26 3.17 19.76-8.62 0 0-.44 16.31-12.88 24.92 0 0 8.19.3 13.14-10.63 0 0 4.39 12.88-7.87 19.29-6.95 3.66-6.48 7.52.49 7.01-3.6 12.93-13.57 17.88-24.8 21.24L12.82 18.62z" class="colorf1b974 svgShape"></path><path fill="#d08230" d="M15.48 19.21c2.4-2.07 11.12-8.03 18.86-8.57-.25.97-.35 2.04-.07 3.07.36 1.33 1.25 2.36 2.58 2.98l.08.03c.63.27 1.72.55 2.9.55 1.83 0 3.34-.65 4.38-1.88.83-.98 1.29-2.27 1.38-3.85.21.01.44.01.67.01 3.82 0 8.66.05 13.7-4-1.11 4.87-4.91 11.74-11.13 16.04-.91.67-1.06.9-2.82 2.9.91.56 2.07 1.12 4.04 1.16h.11c.79 0 6.58-.21 11.56-6.18-.32 3.51-1.96 7.8-7.39 10.63-6.16 3.24-6.44 6.28-6.06 7.81.27 1.1 1.23 2.85 4.53 3.33-3.5 8.97-10.74 13.23-20.46 16.36L15.48 19.21z" class="colord08230 svgShape"></path><circle cx="23.77" cy="39.72" r="23.77" fill="#2e435a" class="color2e435a svgShape"></circle><circle cx="23.77" cy="39.72" r="19.72" fill="#eff3f5" transform="rotate(-45.001 23.77 39.716)" class="coloreff3f5 svgShape"></circle><path fill="#dededf" d="M43.49 39.72c0 10.89-8.83 19.72-19.72 19.72V20c10.89 0 19.72 8.83 19.72 19.72z" class="colordededf svgShape"></path><path fill="#445b69" d="M13.18 29.82c-.18 0-.35-.07-.49-.2l-1.93-1.93a.694.694 0 0 1 .98-.98l1.93 1.93c.27.27.27.71 0 .98-.14.13-.31.2-.49.2zM8.79 40.41H6.06c-.38 0-.69-.31-.69-.69s.31-.69.69-.69H8.8c.38 0 .69.31.69.69s-.31.69-.7.69zm2.46 12.52c-.18 0-.35-.07-.49-.2a.694.694 0 0 1 0-.98l1.93-1.93a.694.694 0 0 1 .98.98l-1.93 1.93c-.14.13-.32.2-.49.2zm25.04 0c-.18 0-.35-.07-.49-.2l-1.93-1.93a.694.694 0 0 1 .98-.98l1.93 1.93c.27.27.27.71 0 .98-.14.13-.31.2-.49.2zm5.19-12.52h-2.74c-.38 0-.69-.31-.69-.69s.31-.69.69-.69h2.74c.38 0 .69.31.69.69s-.31.69-.69.69zm-7.12-10.59c-.18 0-.35-.07-.49-.2a.694.694 0 0 1 0-.98l1.93-1.93a.694.694 0 0 1 .98.98l-1.93 1.93c-.14.13-.32.2-.49.2z" class="color445b69 svgShape"></path><path fill="#293b4e" d="M32.16 41.1h-8.39c-.76 0-1.38-.62-1.38-1.38 0-.76.62-1.38 1.38-1.38h8.39c.76 0 1.38.62 1.38 1.38 0 .76-.62 1.38-1.38 1.38z" class="color293b4e svgShape"></path><path fill="#324a5e" d="M23.77 40.58c-.35 0-.67-.21-.81-.55l-4.28-10.94c-.17-.44.05-.95.49-1.12.44-.17.95.05 1.12.49l4.28 10.94c.17.44-.05.95-.49 1.12-.1.04-.21.06-.31.06z" class="color324a5e svgShape"></path><path fill="#df4666" d="M24.3 39.33a.65.65 0 0 0-.92-.14l-11.55 8.44c-.29.21-.36.63-.14.92a.65.65 0 0 0 .92.14l11.55-8.44c.29-.21.35-.63.14-.92z" class="colordf4666 svgShape"></path><path fill="#445b69" d="M26.82 39.72a3.05 3.05 0 1 1-6.1 0 3.05 3.05 0 0 1 3.05-3.05 3.043 3.043 0 0 1 3.05 3.05z" class="color445b69 svgShape"></path><path fill="#bdbdbe" d="M43.49 39.72c0 .18 0 .36-.01.54-.3-10.63-9.01-19.14-19.71-19.14V20c10.89 0 19.72 8.83 19.72 19.72z" class="colorbdbdbe svgShape"></path><path fill="#c6c1c1" d="M23.77 20v1.12c-10.71 0-19.42 8.52-19.71 19.16-.01-.19-.01-.37-.01-.56C4.05 28.83 12.87 20 23.77 20z" class="colorc6c1c1 svgShape"></path><path fill="#445b69" d="M23.08 22.01v2.74c0 .38.31.69.69.69v-4.12c-.38 0-.69.31-.69.69z" class="color445b69 svgShape"></path><path fill="#293b4e" d="M24.46 24.74V22c0-.38-.31-.69-.69-.69v4.12c.38.01.69-.3.69-.69z" class="color293b4e svgShape"></path><path fill="#445b69" d="M23.08 54.69v2.74c0 .38.31.69.69.69V54c-.38 0-.69.31-.69.69z" class="color445b69 svgShape"></path><path fill="#293b4e" d="M24.46 57.43v-2.74c0-.38-.31-.69-.69-.69v4.12c.38 0 .69-.31.69-.69z" class="color293b4e svgShape"></path></svg>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="mt-5 text-center">
                        <img style="width: 170px;" src="{{asset('/images/no-data-a.png')}}" alt="no-data">
                        <div class="text-white nodata">No data yet</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
