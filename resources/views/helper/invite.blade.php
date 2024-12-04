@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{route('home')}}" class="text-decoration-none text-white">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div class="text-white">SharkTrades Referral Program</div>
@endsection

@section('content')
    <div class="">
        <div class="card-background text-center pb-3 my-3 bg-invite" >
            <h4 class="text-white px-1 let-bring">{{ config('app.name') }} Connections: Bring-a-Friend Program</h4>
			<img src="images/refer.png" alt="refer-image">
        </div>
        <div class="card-background container card-background-invite justify-content-center align-items-center mb-3">
            <div class="card-header">
                <div class="d-flex">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 128 128" width="35" height="35"><defs><linearGradient id="c" x1="79.45" x2="79.45" y1="58.183" y2="43.483" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#e53b48" class="stopColore53b48 svgShape"></stop><stop offset="1" stop-color="#de3744" class="stopColorde3744 svgShape"></stop></linearGradient><linearGradient id="h" x1="48.55" x2="48.55" y1="58.183" y2="43.483" xlink:href="#c"></linearGradient><linearGradient id="j" x1="64" x2="64" y1="111.187" y2="62.075" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#ffea63" class="stopColorffea63 svgShape"></stop><stop offset=".411" stop-color="#ffe862" class="stopColorffe862 svgShape"></stop><stop offset=".631" stop-color="#fee05f" class="stopColorfee05f svgShape"></stop><stop offset=".806" stop-color="#fdd25a" class="stopColorfdd25a svgShape"></stop><stop offset=".957" stop-color="#fbbf54" class="stopColorfbbf54 svgShape"></stop><stop offset="1" stop-color="#fab851" class="stopColorfab851 svgShape"></stop></linearGradient><linearGradient id="k" x1="64" x2="64" y1="111.187" y2="62.075" xlink:href="#b"></linearGradient><linearGradient id="d" x1="39.857" x2="39.857" y1="67.075" y2="50.776" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fab851" class="stopColorfab851 svgShape"></stop><stop offset=".05" stop-color="#fabc52" class="stopColorfabc52 svgShape"></stop><stop offset=".41" stop-color="#fdd55c" class="stopColorfdd55c svgShape"></stop><stop offset=".737" stop-color="#fee561" class="stopColorfee561 svgShape"></stop><stop offset="1" stop-color="#ffea63" class="stopColorffea63 svgShape"></stop></linearGradient><linearGradient id="l" x1="88.143" x2="88.143" y1="67.075" y2="50.776" xlink:href="#d"></linearGradient><linearGradient id="m" x1="64" x2="64" y1="67.075" y2="50.776" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#d12f3c" class="stopColord12f3c svgShape"></stop><stop offset=".095" stop-color="#dc3946" class="stopColordc3946 svgShape"></stop><stop offset=".265" stop-color="#e94451" class="stopColore94451 svgShape"></stop><stop offset=".491" stop-color="#f04b58" class="stopColorf04b58 svgShape"></stop><stop offset="1" stop-color="#f24d5a" class="stopColorf24d5a svgShape"></stop></linearGradient><radialGradient id="a" cx="21.652" cy="22.47" r="5.6" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#ffea63" class="stopColorffea63 svgShape"></stop><stop offset=".324" stop-color="#fede5f" class="stopColorfede5f svgShape"></stop><stop offset=".913" stop-color="#fbbd53" class="stopColorfbbd53 svgShape"></stop><stop offset="1" stop-color="#fab851" class="stopColorfab851 svgShape"></stop></radialGradient><radialGradient id="e" cx="97.991" cy="18.243" r="5.6" xlink:href="#a"></radialGradient><radialGradient id="f" cx="109.191" cy="32.547" r="5.6" xlink:href="#a"></radialGradient><radialGradient id="b" cx="72.84" cy="30.021" r="26.455" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#f24d5a" class="stopColorf24d5a svgShape"></stop><stop offset=".509" stop-color="#f04b58" class="stopColorf04b58 svgShape"></stop><stop offset=".735" stop-color="#e94451" class="stopColore94451 svgShape"></stop><stop offset=".905" stop-color="#dc3946" class="stopColordc3946 svgShape"></stop><stop offset="1" stop-color="#d12f3c" class="stopColord12f3c svgShape"></stop></radialGradient><radialGradient id="g" cx="28.958" cy="32.494" r="26.114" xlink:href="#b"></radialGradient><radialGradient id="i" cx="56.587" cy="37.98" r="13.895" xlink:href="#b"></radialGradient></defs><path fill="url(#a)" d="M27.2522,22.47c0,1.7678-2.2743.8257-3.5243,2.0757S23.42,28.07,21.6522,28.07s-.8258-2.2743-2.0758-3.5243-3.5242-.3079-3.5242-2.0757,2.2742-.8257,3.5242-2.0757.308-3.5243,2.0758-3.5243.669,2.736,2.2,3.62C25.6947,21.5532,27.2522,20.7023,27.2522,22.47Z"></path><path fill="url(#e)" d="M103.5913,18.2433c0,1.7678-2.2743.8257-3.5243,2.0757s-.308,3.5243-2.0757,3.5243-.8258-2.2743-2.0758-3.5243-3.5242-.3079-3.5242-2.0757,2.2742-.8257,3.5242-2.0757.308-3.5243,2.0758-3.5243.669,2.736,2.2,3.62C102.0338,17.3264,103.5913,16.4755,103.5913,18.2433Z"></path><path fill="url(#f)" d="M114.7913,32.5465c0,1.7678-2.2743.8257-3.5243,2.0757s-.308,3.5243-2.0757,3.5243-.8258-2.2743-2.0758-3.5243-3.5242-.3079-3.5242-2.0757,2.2742-.8257,3.5242-2.0757.308-3.5243,2.0758-3.5243.669,2.736,2.2,3.62C113.2338,31.63,114.7913,30.7787,114.7913,32.5465Z"></path><path fill="url(#b)" d="M70.0072,48.6673,85.17,58.1829C99.8381,60.26,98.5862,26.9465,88.5742,26.9465c-11.7655,0-17.5947,10.5792-18.567,12.2923Z"></path><path fill="url(#c)" d="M70.0072,48.6673A21.5342,21.5342,0,0,0,85.17,58.1829C91.6624,52.3325,91.418,34.8669,70.0072,48.6673Z"></path><path fill="url(#g)" d="M57.9928,48.6673,42.8305,58.1829C28.1619,60.26,29.4138,26.9465,39.4258,26.9465c11.7655,0,17.5947,10.5792,18.567,12.2923Z"></path><path fill="url(#h)" d="M57.9928,48.6673a21.5342,21.5342,0,0,1-15.1623,9.5156C36.3376,52.3325,36.582,34.8669,57.9928,48.6673Z"></path><path fill="url(#i)" d="M69.146,38.5305A8.8309,8.8309,0,0,0,55.167,45.7V58.3327H72.833V45.7A8.8132,8.8132,0,0,0,69.146,38.5305Z"></path><path fill="url(#j)" d="M30.1794,62.0753V107.187a4,4,0,0,0,4,4H93.8206a4,4,0,0,0,4-4V62.0753Z"></path><polygon fill="url(#k)" points="55.167 62.075 55.167 73.862 55.167 111.187 72.833 111.187 72.833 73.862 72.833 62.075 55.167 62.075"></polygon><path fill="url(#d)" d="M26.5477,50.7759a4,4,0,0,0-4,4v8.2994a4,4,0,0,0,4,4H55.167l2-8.15-2-8.15Z"></path><path fill="url(#l)" d="M101.4523,50.7759H72.833l-2,8.15,2,8.15h28.6193a4,4,0,0,0,4-4V54.7759A4,4,0,0,0,101.4523,50.7759Z"></path><rect width="17.666" height="16.299" x="55.167" y="50.776" fill="url(#m)"></rect></svg>
                    </div>
                    <div class="text" style="line-height: 40px; font-size: 1rem">
                        Rebate Rules
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row mb-3">
                        <div class="form-group">
                            <div class="btn-polygon-2 b02 margin">
                                <div class="d-flex justify-content-center gap-3">
                                    <span style="line-height: 29px">
                                        My Invitation Code
                                    </span>
                                    <span class="" style="font-size: 1.2rem"><strong>{{$referral_code}}</strong></span>
                                    <span class="my-auto">
                                        <a id="text" class="tooltip-wrapper" href="javascript:void(0);" onclick="copyLink('{{$referral_code}}', true)">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="#19d2d2" d="M9.75 19.5a4.255 4.255 0 0 1-4.25-4.25V5H3.75A2.752 2.752 0 0 0 1 7.75v13.5A2.752 2.752 0 0 0 3.75 24h12.5A2.752 2.752 0 0 0 19 21.25V19.5z" class="color1976d2 svgShape"></path><path fill="#4effff" d="M23 2.75A2.75 2.75 0 0 0 20.25 0H9.75A2.75 2.75 0 0 0 7 2.75v12.5A2.75 2.75 0 0 0 9.75 18h10.5A2.75 2.75 0 0 0 23 15.25z" class="color2196f3 svgShape"></path></svg>
                                            <div id="copy-info" class="copy-info right"></div>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <span class="text-center text-white lt-for">
                            For every profit your friend earns after signing up, you will receive a proportional commission
                        </span>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group">
                            <div class="btn-polygon-2 b02">
                                <div class="d-flex justify-content-center gap-1">
                                    <span class="m-auto" style="line-height: 29px">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-name="Layer 7" viewBox="0 0 24 24" width="25" height="25"><defs><linearGradient id="b" x1="10.99" x2="13.01" y1="10.99" y2="13.01" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#ffffff" class="stopColorfdc830 svgShape"></stop><stop offset="1" stop-color="#5235f3" class="stopColorf37335 svgShape"></stop></linearGradient><linearGradient id="a" x1="3.733" x2="11.087" y1="12.913" y2="20.267" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#4effff" class="stopColor6dd5fa svgShape"></stop><stop offset="1" stop-color="#796acc" class="stopColor2980b9 svgShape"></stop></linearGradient><linearGradient id="c" x1="12.913" x2="20.267" y1="3.733" y2="11.087" xlink:href="#a"></linearGradient></defs><path fill="#FFFFFF" d="M8.133 15.867a1.428 1.428 0 0 0 2.02 0l5.714-5.714a1.428 1.428 0 0 0-2.02-2.02l-5.714 5.714a1.428 1.428 0 0 0 0 2.02Z"></path><path fill="#4EFFFF" d="m11.942 15.371-3.086 3.086a2.4 2.4 0 0 1-3.314 0 2.34 2.34 0 0 1 0-3.31l3.086-3.086a1.428 1.428 0 0 0-2.02-2.02l-3.085 3.083a5.2 5.2 0 0 0 0 7.351l.022.025a5.2 5.2 0 0 0 7.332-.019l3.086-3.086a1.428 1.428 0 0 0-2.021-2.024Z"></path><path fill="#4EFFFF" d="m20.477 3.525-.022-.025a5.2 5.2 0 0 0-7.332.019l-3.085 3.09a1.428 1.428 0 0 0 2.02 2.02l3.086-3.086a2.4 2.4 0 0 1 3.314 0 2.34 2.34 0 0 1 0 3.31l-3.086 3.086a1.428 1.428 0 1 0 2.02 2.02l3.086-3.086a5.2 5.2 0 0 0-.001-7.348Z"></path></svg>
                                    </span>
                                    <span type="text" id="referral_link" class="referral-link" onclick="copyLink('{{$referral_code}}')">
                                        {{ url('/') }}/register?referral_code={{$referral_code}}
                                    </span>
                                    <span class="my-auto">
                                        <a id="text" class="tooltip-wrapper" href="javascript:void(0);" onclick="copyLink('{{ $referral_code }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="#19d2d2" d="M9.75 19.5a4.255 4.255 0 0 1-4.25-4.25V5H3.75A2.752 2.752 0 0 0 1 7.75v13.5A2.752 2.752 0 0 0 3.75 24h12.5A2.752 2.752 0 0 0 19 21.25V19.5z" class="color1976d2 svgShape"></path><path fill="#4effff" d="M23 2.75A2.75 2.75 0 0 0 20.25 0H9.75A2.75 2.75 0 0 0 7 2.75v12.5A2.75 2.75 0 0 0 9.75 18h10.5A2.75 2.75 0 0 0 23 15.25z" class="color2196f3 svgShape"></path></svg>
                                            <div id="copy-referral" class="copy-info bottom"></div>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
<!--        <section class="card-background" >
            <div class="d-flex flex-column justify-content-center gap-1 align-items-center align-content-center mt-4">
                <img
                    class="attention"
                     src="{{ asset('/images/troph.png') }}" alt="invite">
                <h6 class="text-white "> Top 5 (Month)</h6>
            </div>

                <div class="table-earning d-flex justify-content-start flex-column p-4">
                    <div class="row text-center" style="border-bottom: 1px solid #6362624a;line-height: 32px;">
                        <div class=" col-4 text-white">Rank</div>
                        <div class=" col-4 text-white">Id</div>
                        <div class=" col-4 text-white">Commission</div>
                    </div>
                    <div class="row text-center " style="border-bottom: 1px solid #6362624a;line-height: 32px;">
                        <div class=" col-4"><img style="width: 25px;"
                                                           src="{{ asset('/images/1.png') }}" alt="1"></div>
                        <div class="col-4 text-warning">Go**i</div>
                        <div class=" col-4 text-warning">1,898</div>
                    </div>
                    <div class="row text-center" style="border-bottom: 1px solid #6362624a;line-height: 32px;">
                        <div class=" col-4"><img style="width: 25px;"
                                                           src="{{ asset('/images/2.png') }}" alt="12"></div>
                        <div class="col-4 text-info">she***s</div>
                        <div class="col-4 text-info">1,655</div>
                    </div>
                    <div class="row  text-center" style="border-bottom: 1px solid #6362624a;line-height: 32px;">
                        <div class=" col-4"><img style="width: 25px;"
                                                           src="{{ asset('/images/3.png') }}" alt="3"></div>
                        <div class="col-4 text-danger">un***t</div>
                        <div class=" col-4 text-danger">1,472</div>
                    </div>
                    <div class="row  text-center" style="border-bottom: 1px solid #6362624a;line-height: 32px;">
                        <div class=" col-4 text-white">4</div>
                        <div class=" col-4 text-white">Di***o</div>
                        <div class=" col-4 text-white">1,187</div>
                    </div>
                    <div class="row  text-center" style="border-bottom: 1px solid #6362624a;line-height: 32px;">
                        <div class=" col-4 text-white">5</div>
                        <div class=" col-4 text-white">Ke*****i</div>
                        <div class=" col-4 text-white">1,003</div>
                    </div>
                </div>
        </section>-->
        <section class="card-background home-trophy-wrapper pt-1 pb-2 mx-2 trophy-section" >
            <div class="card-header px-2 py-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <div class="icon">
                            <img width="25" src="{{ asset('images/bitcoin.svg') }}" alt="Commission">
                        </div>
                        <div class="text" style="font-size: 1rem">
                            Commission Rate
                        </div>
                    </div>
                    <div class="teams">
                        <a href="/my-team" class="button-14 p-0 m-0" role="button">
                            My Team
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 15px">
                                <path fill-rule="evenodd"
                                      d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
                                      clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="container table-earning d-flex justify-content-start flex-column">
                <div class="row lt-rna">
                    <div class=" col-4 text-center text-white">Rank</div>
                    <div class=" col-4 text-center text-white">Id</div>
                    <div class=" col-4 text-center text-white">Commission</div>
                </div>
                <div class="row border-bottom lt-rna-1">
                    <div class="col-4 text-center m-auto">
                        <img style="width: 25px;" src="{{ asset('/images/1-rank.png') }}" alt="1">
                    </div>
                    <div class="col-4 text-center text-warning">Go**i</div>
                    <div class=" col-4 text-center text-warning">1,898</div>
                </div>
                <div class="row border-bottom lt-rna-1">
                    <div class="col-4 text-center m-auto">
                        <img style="width: 25px;" src="{{ asset('/images/2-rank.png') }}" alt="12">
                    </div>
                    <div class="col-4 text-center text-info">she***s</div>
                    <div class="col-4 text-center text-info">1,655</div>
                </div>
                <div class="row border-bottom lt-rna-1">
                    <div class="col-4 text-center m-auto">
                        <img style="width: 25px;" src="{{ asset('/images/3-rank.png') }}" alt="3">
                    </div>
                    <div class="col-4 text-center text-danger">un***t</div>
                    <div class=" col-4 text-center text-danger">1,472</div>
                </div>
                <div class="row border-bottom lt-rna-1">
                    <div class=" col-4 text-center text-white">4</div>
                    <div class=" col-4 text-center text-white">Di***o</div>
                    <div class=" col-4 text-center text-white">1,187</div>
                </div>
                <div class="row border-bottom lt-rna-1">
                    <div class=" col-4 text-center text-white">5</div>
                    <div class=" col-4 text-center text-white">Ke*****i</div>
                    <div class=" col-4 text-center text-white">1,003</div>
                </div>
            </div>
        </section>
    </div>
@endsection
<script>
    function myFunction(code) {
        let text = document.getElementById("text");
        let info = document.getElementById("copy-info");
        info.innerText = 'Copied';
        setTimeout(() => {
            info.innerText = '';
        }, 5000);
        text.classList.add("text-success")
        navigator.clipboard.writeText(code);
    }
    function copyLinkOld(code) {
        let base_url = '{{ url('/') }}';
        code = base_url + '/register?referral_code=' + code;
        let text = document.getElementById("referral_link");
        let info = document.getElementById("copy-referral");
        info.innerText = 'Copied';
        setTimeout(() => {
            info.innerText = '';
        }, 5000);
        // text.innerText = "Copied"
        // text.classList.add("text-success")
        navigator.clipboard.writeText(code);
    }
    function copyLink(code, onlyCode = false) {
        let copyText = code
        if(onlyCode === false){
            let base_url = '{{ url('/') }}';
            copyText = base_url + '/register?referral_code=' + code;
        }
        let text = document.getElementById("referral_link");
        let info = document.getElementById("copy-referral");
        info.innerText = 'Copied';
        try {
            // Attempt to copy using the new asynchronous Clipboard API
            navigator.clipboard.writeText(copyText).then(function() {
            }).catch(function(err) {
                // Fallback to the document.execCommand method for browsers that don't support Clipboard API
                document.execCommand('copy');
            });
        } catch (err) {
            // Fallback to the document.execCommand method for browsers that don't support Clipboard API
            document.execCommand('copy');
        }
        setTimeout(() => {
            info.innerText = '';
        }, 3000);
    }
</script>
