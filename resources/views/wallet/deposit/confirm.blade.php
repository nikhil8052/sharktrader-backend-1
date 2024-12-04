@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('wallet.deposit.index') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>Confirm Deposits</div>
@endsection

@section('content')
    <div class="container">

        <div class="container card-background mt-2 pb-4">
            <div class="row mt-2">
                <a href="/privacy-policy" class="row p-2 m-auto align-items-center text-decoration-none text-white">
                    <div class="col-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" image-rendering="optimizeQuality" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" viewBox="0 0 20113 20113" width="25" height="25"><path fill="#43ffff" d="M15977 11008h3218c505 0 918 413 918 918v2145c0 505-413 918-918 918h-3218c-505 0-918-413-918-918v-2145c0-505 413-918 918-918zm869 863c629 0 1139 510 1139 1139 0 628-510 1138-1139 1138s-1139-510-1139-1138c0-629 510-1139 1139-1139z" class="color04599c svgShape"></path><path fill="#4effff" d="M2285 5901h2338c-7 109-11 218-11 329 0 3007 2438 5444 5444 5444 3007 0 5445-2437 5445-5444 0-111-4-220-11-329h1481c1257 0 2285 1028 2285 2285v2216c-20-1-40-2-61-2h-3218c-839 0-1526 687-1526 1526v2145c0 839 687 1526 1526 1526h3218c21 0 41-1 61-2v2168c0 1283-1050 2333-2333 2333h-6252v-2841h1703c128 441 536 764 1019 764 586 0 1061-474 1061-1060s-475-1061-1061-1061c-469 0-867 305-1007 726h-2030c-198 8-294 123-315 315v3157H8218l-3-5293c442-128 765-536 765-1019 0-586-475-1060-1061-1060s-1060 474-1060 1060c-1 469 304 867 725 1007l3 5305H5882v-3157c-21-192-117-307-315-315H3537c-141-421-538-726-1007-726-586 0-1061 475-1061 1061s475 1060 1061 1060c483 0 891-323 1019-764h1702v2841H2334C1050 20096 0 19046 0 17763V8186c0-1257 1028-2285 2285-2285z" class="color333 svgShape"></path><path fill="#43ffff" d="M10056 1949c2365 0 4281 1917 4281 4281s-1916 4281-4281 4281c-2364 0-4280-1917-4280-4281s1916-4281 4280-4281zM7913 8519h804v735h717v-735h555v735h717v-735h534c677 0 1230-553 1230-1230s-553-1231-1230-1231h-102c582 0 1059-476 1059-1058 0-583-477-1059-1059-1059h-432v-734h-717v734h-555v-734h-717v734h-804v751h707v3076h-707v751zm1620-812h1271c328 0 597-269 597-597 0-329-269-597-597-597H9533v1194zm0-3010h1242c283 0 514 231 514 514 0 282-231 514-514 514H9533V4697zM17429 0c1482 0 2684 1202 2684 2684s-1202 2683-2684 2683-2684-1201-2684-2683S15947 0 17429 0zm0 3471-1301-763 1301-2171 1301 2171-1301 763zm-1301-568 1301 1928 1301-1928-1301 817-1301-817zM2684 0c1482 0 2683 1202 2683 2684S4166 5367 2684 5367 0 4166 0 2684 1202 0 2684 0zM1257 3207l384-138-272 1026h2677l171-638-1670-1 209-789 502-196 120-470-490 177 352-1334H2233l-459 1729-375 149-142 485z" class="color04599c svgShape"></path><path fill="none" d="M0 0h20113v20113H0z"></path></svg>
                    </div>
                    <div class="col-7">Payment Amount</div>
                    <div class="col-2 gap-1 d-flex justify-content-between align-content-center align-items-center">
                        <div>
                            {{ $depositAmount }}
                        </div>
                        <div>
                            <img style="width: 25px;" src="{{ asset('/images/Tether-USDT-icon.webp') }}" alt="logo">
                        </div>
                    </div>
                </a>
            </div>

{{--            <div class="row mt-1">--}}
{{--                <img class="col-6 mt-1 m-auto" src='data:image/png;base64,{{$qr_code}}' alt='Payment QR Code'/>--}}

{{--                <a href="{{ $payment_uri }}" class="row text-decoration-none">--}}
{{--                    <button class="button-14" role="button" style="margin-bottom: 0 !important;">--}}
{{--                        <span class="text">Deposit Now</span>--}}
{{--                        <span class="button-14-background green"></span>--}}
{{--                        <!-- mask-border fallback -->--}}
{{--                        <svg style="position: absolute;" width="0" height="0">--}}
{{--                            <filter id="remove-black-button-14" color-interpolation-filters="sRGB">--}}
{{--                                <feColorMatrix type="matrix" values="1 0 0 0 0--}}
{{--0 1 0 0 0--}}
{{--0 0 1 0 0--}}
{{---1 -1 -1 0 1" result="black-pixels"></feColorMatrix>--}}
{{--                                <feComposite in="SourceGraphic" in2="black-pixels" operator="out"></feComposite>--}}
{{--                            </filter>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                </a>--}}
{{--            </div>--}}
            <div class="container bg-fade-dark mt-1 py-2">
                <div class="">
                    <label class="mb-2 fw-bold text-white justify-content-center">
                        <span class="text">
                            {{ __('Wallet Payment Address') }}
                        </span>
                    </label>
                    <div class="py-3 mx-auto text-center" style="font-size: 1.2rem;">
                        {{ $payment_address }}
                    </div>
                </div>
                <a class="row text-decoration-none" href="{{ route('wallet.deposit.status', ['payment_id' => $payment_id]) }}">
                    <button type="submit" class="button-14 w-full" role="button" style="margin-bottom: 0px !important;">
                        <div class="text row">
                            <div class="col-12">Payment Sent? Check Status</div>
                        </div>
                        <span class="button-14-background blue"></span>
                        <svg width="0" height="0"
                             style="position: absolute;">
                            <filter id="remove-black-button-14" color-interpolation-filters="sRGB">
                                <feColorMatrix type="matrix" values="1 0 0 0 0
                                                            0 1 0 0 0
                                                            0 0 1 0 0
                                                            -1 -1 -1 0 1" result="black-pixels"></feColorMatrix>
                                <feComposite in="SourceGraphic" in2="black-pixels"
                                             operator="out"></feComposite>
                            </filter>
                        </svg>
                    </button>
                </a>
            </div>
            <div class="mt-3 text-center">
                <div class="bg-fade-dark px-1 py-2">
{{--                    <div class="mt-2 text-white fw-bold"> {{$payment_address}} </div>--}}
                    <div class="mt-2 description">
                        <h5 class="text-white">
                            Please complete the payment before
                        </h5>
                        <a class="btn btn-danger" href="javascript:void(0);" style="font-size: 1.3rem">{{ $available }}"</a>
                    </div>
                </div>
            </div>
{{--            <div class="row">--}}
{{--                <button class="button-14 mt-2" role="button" id="text" onclick="myFunction('{{ $payment_address }}')">--}}
{{--                    <span class="text">Copy deposit code</span>--}}
{{--                    <span class="button-14-background blue"></span>--}}
{{--                    &lt;!&ndash; mask-border fallback &ndash;&gt;--}}
{{--                    <svg style="position: absolute;" width="0" height="0">--}}
{{--                        <filter id="remove-black-button-14" color-interpolation-filters="sRGB">--}}
{{--                            <feColorMatrix type="matrix" values="1 0 0 0 0--}}
{{--0 1 0 0 0--}}
{{--0 0 1 0 0--}}
{{---1 -1 -1 0 1" result="black-pixels"></feColorMatrix>--}}
{{--                            <feComposite in="SourceGraphic" in2="black-pixels" operator="out"></feComposite>--}}
{{--                        </filter>--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--            </div>--}}
        </div>

    </div>
@endsection
<script defer>
    function myFunction(code) {
        let text = document.getElementById("text");
        text.innerText = "Copied"
        text.classList.add("text-info")
        navigator.clipboard.writeText(code);
    }

    function getTimeZone(){
        let span = document.getElementById("time");
        let now = new Date();
        now.setMinutes(now.getMinutes() + 30);
        now = new Date(now);
        span.innerHTML= now.toLocaleString();
    }

    /*document.addEventListener("DOMContentLoaded", function(){
        getTimeZone()
    });*/
</script>
<style>
    .code{
        font-size: 12px;
    }
    .description{
        font-size: 13px;
        color: #FFFFFF;
    }
</style>
