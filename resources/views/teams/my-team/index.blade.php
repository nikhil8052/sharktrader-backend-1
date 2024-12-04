@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('user-menu') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>SharkTrades Team Overview</div>
@endsection

@section('content')
    <div class="container my-team mt-4">
        @if(session()->has('success') || session()->has('error') )
            <toast-dynamic :message="'{{ session()->get('success') }}'"
                           :error="'{{ session()->get('error') }}'"></toast-dynamic>
        @endif
        @if($myTeam)
                <div class="sectionnn">
                    <section class="">
                        <div class="d-flex justify-content-between p-2" style="min-height: 140px">
                            <div class="fw-bold text-white info text-center">
                                <div>
                                    <h3>Team referral code</h3>
                                </div>
                                <div class="mt-3 d-flex justify-content-center gap-2">
                                    <h2>{{ @$myTeam->referral_code }}</h2>
                                    <a id="text" href="javascript:void(0);"
                                       onclick="copyLink('{{@$myTeam->referral_code}}')">
                                        <img src="{{ asset('images/duplicate.svg') }}" width="20" alt="Copy Link">
                                        <div id="copy-referral" class="copy-info bottom"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="fw-bold text-white info">
                                <div class="glow-team-img"></div>
                                <div class="glow-team-element"></div>
                            </div>
                        </div>
                    </section>
                    <section class="card-background ">
                        <div class=" row justify-content-center align-items-center">
                            <div class="p-0">
                                <section class="pb-4 d-flex justify-content-between flex-column">
                                    <div class="p-2 d-flex align-items-center   justify-content-between text-decoration-none">
                                        <div class="p-0 fw-bold text-white info lt-rce ">
                                            <div>
                                                Accumulated Commission
                                            </div>
                                            <div>
                                                <div class="text-xl fw-bold text-white info">
                                                    <h3>
                                                        {{@$myTeam->received_commission}}
                                                        <img style="width: 30px;" src="{{ asset('/images/Tether-USDT-icon.webp') }}" alt="logo">

                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
										<div class="p-0 fw-bold text-white info lt-rce">
                                            <div>
                                                Received Commission
                                            </div>
                                            <div>
                                                <div class="text-xl fw-bold text-white info">
                                                    <h3>
                                                        {{@$myTeam->received_commission}}
                                                        <img style="width: 30px;" src="{{ asset('/images/Tether-USDT-icon.webp') }}" alt="logo">

                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center gap-1">

                                            <div>
                                                <a href="{{ route('team.claim-commission', ['team' => $myTeam]) }}"
                                                   class="lt-rcv-btn small_button gradient text-decoration-none d-flex justify-content-center align-items-center menu-button mb-2 mx-auto px-1 py-3 text-center simple-box-shadow">
                                                    Receive Now
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
        @endif
        <team-member :levels="{{json_encode($levels)}}"></team-member>
    </div>
@endsection
<script>
    function copyLink(code) {
        let copyText = code;
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
