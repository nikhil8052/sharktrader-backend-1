<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> SharkTrades</title>

    <!-- Fonts -->
    <link rel="icon" href="{{ asset('images/logo-fav-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo-fav-icon.png') }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Audiowide|Iceland|Monoton|Pacifico|Press+Start+2P|Vampiro+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ mix('js/content.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/4lm625ygbsn47ft7n9jebje7yve8n5l5ucy7xo5v1spzam0j/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
    <style>
        .card-text-white, .card-text-white a{
            color: #fff;
        }
        .card-text-white table{
            color: #fff;
        }
        .code{
            color: green;
        }
    </style>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/65afb6c30ff6374032c3bdbe/1hkr63rfj';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    @yield('style')
</head>

<body>
<div id="app" class="mobile" style="
                min-height: 100vh;
                background-attachment: scroll;
                background-position: center;
            ">
    <nav class="navbar background-img-nav">

    <div id="nav-top" class="border-b border-gradient border-gradient-blue">
        <div>
            @yield('previous-button')
        </div>
        <div>
            @yield('title')
        </div>
        <div class="d-flex align-content-center align-items-baseline justify-content-between">
            @yield('info')
            @can('manage_users')
                @yield('admin-menu')
            @endcan
        </div>
{{--        <div id="scroll-bar"></div>--}}
    </div>
    </nav>
    <main class="card-text-white" style="padding-bottom: 83px;padding-top: 55px">
        <div class="glow-element"></div>
        @yield('content')
    </main>
    <div id="nav-bottom" class=" text-decoration-none">
        <div class="container container-bottom-icons pt-2 align-items-center">

            {{--                <a href="/l-menu" class="nav-home text-decoration-none  bottom-nav-logo">--}}
            {{--                    --}}{{-- <img  src="{{asset('/storage/images/attachments/exchange.png')}}" alt="exchange">--}}
            {{--                    <div class="bottom-nav-logo">--}}
            {{--                    <svg style="width: 30px; margin-top: 4px;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
            {{--                        <g clip-path="url(#clip0_429_11066)">--}}
            {{--                        <path d="M3 6.00092H21M3 12.0009H21M3 18.0009H21" stroke="#292929" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
            {{--                        </g>--}}
            {{--                        <defs>--}}
            {{--                        <clipPath id="clip0_429_11066">--}}
            {{--                        <rect width="24" height="24" fill="white" transform="translate(0 0.000915527)"/>--}}
            {{--                        </clipPath>--}}
            {{--                        </defs>--}}
            {{--                        </svg>--}}
            {{--                    </div>--}}
            {{--                </a>--}}


            <a href="/exchange"
               class="nav-home text-decoration-none  bottom-nav-logo {{ request()->url() === route('exchange.index') ? 'active' : '' }}">
                {{-- <img  src="{{asset('/storage/images/attachments/exchange.png')}}" alt="exchange">--}}
                <div class="bottom-nav-logo d-flex justify-content-center flex-column align-items-center">
                    <!-- <svg style="width: 30px;margin-top: 4px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M12 5.25c1.213 0 2.415.046 3.605.135a3.256 3.256 0 013.01 3.01c.044.583.077 1.17.1 1.759L17.03 8.47a.75.75 0 10-1.06 1.06l3 3a.75.75 0 001.06 0l3-3a.75.75 0 00-1.06-1.06l-1.752 1.751c-.023-.65-.06-1.296-.108-1.939a4.756 4.756 0 00-4.392-4.392 49.422 49.422 0 00-7.436 0A4.756 4.756 0 003.89 8.282c-.017.224-.033.447-.046.672a.75.75 0 101.497.092c.013-.217.028-.434.044-.651a3.256 3.256 0 013.01-3.01c1.19-.09 2.392-.135 3.605-.135zm-6.97 6.22a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.752-1.751c.023.65.06 1.296.108 1.939a4.756 4.756 0 004.392 4.392 49.413 49.413 0 007.436 0 4.756 4.756 0 004.392-4.392c.017-.223.032-.447.046-.672a.75.75 0 00-1.497-.092c-.013.217-.028.434-.044.651a3.256 3.256 0 01-3.01 3.01 47.953 47.953 0 01-7.21 0 3.256 3.256 0 01-3.01-3.01 47.759 47.759 0 01-.1-1.759L6.97 15.53a.75.75 0 001.06-1.06l-3-3z" clip-rule="evenodd" />
                    </svg> -->
{{--                    <svg style="margin-top: 4px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="24" height="24"><path d="M 20 4 C 15.054545 4 11 8.0545455 11 13 L 11 35.585938 L 5.7070312 30.292969 L 4.2929688 31.707031 L 12 39.414062 L 19.707031 31.707031 L 18.292969 30.292969 L 13 35.585938 L 13 13 C 13 12.759091 13.01313 12.521884 13.037109 12.287109 C 13.396795 8.7654918 16.386364 6 20 6 L 30 6 L 30.5 6 L 30.5 4 L 30 4 L 20 4 z M 38 10.585938 L 30.292969 18.292969 L 31.707031 19.707031 L 37 14.414062 L 37 37 C 37 40.613636 34.234508 43.603205 30.712891 43.962891 C 30.478116 43.98687 30.240909 44 30 44 L 20 44 L 19.5 44 L 19.5 46 L 20 46 L 30 46 C 30.309091 46 30.614657 45.984029 30.916016 45.953125 C 35.436391 45.489569 39 41.636364 39 37 L 39 14.414062 L 44.292969 19.707031 L 45.707031 18.292969 L 38 10.585938 z"/></svg>--}}
                    <img width="28" alt="trade" src="{{ asset('images/candlestick-chart.png') }}">
                    <span>Trade</span>
                </div>
            </a>
{{--            <a href="{{ route('home') }}"--}}
{{--               class="nav-home text-decoration-none  bottom-nav-logo {{ request()->fullUrl() === route('home') ? 'active' : ''}}">--}}
{{--                --}}{{-- <img  src="{{asset('/storage/images/attachments/home.png')}}" alt="home">--}}
{{--                <div class="bottom-nav-logo d-flex justify-content-center flex-column align-items-center">--}}
{{--                    <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><title>Market--}}
{{--                            Icon</title>--}}
{{--                        <path fill-rule="evenodd" clip-rule="evenodd"--}}
{{--                              d="M19.42 3.25H5.546c-.674 0-1.29.381-1.591.984L1.41 9.329l-.029.058-.018.062a2.443 2.443 0 00.487 2.347c.502.593 1.244.98 2.014 1.168.432.106.906.154 1.385.13v6.863a2.293 2.293 0 002.293 2.293h9.914a2.293 2.293 0 002.293-2.293v-6.859c.479.015.945-.033 1.37-.132.794-.184 1.565-.573 2.04-1.203.512-.678.605-1.542.171-2.42l-2.292-5.05a1.778 1.778 0 00-1.62-1.043zm-1.17 9.59a4.564 4.564 0 01-1.428-.757c-.665.73-1.485 1.16-2.365 1.16-.827 0-1.567-.38-2.142-1.03-.674.661-1.5 1.03-2.358 1.03-.87 0-1.673-.379-2.285-1.061-.28.242-.593.43-.922.573v7.202c0 .438.355.793.793.793h9.914a.793.793 0 00.793-.793v-7.116zM5.547 4.75h13.872c.11 0 .209.064.254.163l2.298 5.061.006.013.006.013c.2.402.132.658-.02.86-.192.254-.595.508-1.183.645-1.189.277-2.657-.026-3.455-1.024l-.66-.826-.562.898c-.555.889-1.183 1.19-1.646 1.19-.442 0-.992-.276-1.418-1.128l-.598-1.197-.71 1.135c-.537.86-1.219 1.19-1.774 1.19-.539 0-1.138-.311-1.547-1.128L7.8 9.393l-.704 1.171c-.542.904-1.746 1.219-2.875.943-.549-.134-.979-.39-1.225-.68a.94.94 0 01-.21-.892l2.512-5.03a.279.279 0 01.249-.155z"--}}
{{--                              fill="currentColor"></path>--}}
{{--                    </svg>--}}
{{--                    <span>Home</span>--}}
{{--                </div>--}}
{{--            </a>--}}
            <a href="{{ route('home') }}" class="nav-home middle text-decoration-none  bottom-nav-logo {{ request()->fullUrl() === route('home') ? 'active' : ''}}">
                <div class="bottom-nav-logo d-flex justify-content-center flex-column align-items-center">
                    <img  src="{{asset('images/home.png')}}" alt="home" width="28" height="28">
                </div>
            </a>
            <a href="{{ route('user-menu') }}"
               class="nav-home text-decoration-none  bottom-nav-logo {{ request()->fullUrl() === route('user-menu') ? 'active' : ''}}">
                {{-- <img  src="{{asset('/storage/images/attachments/my-menu.png')}}" alt="menu">--}}
                <div class="bottom-nav-logo d-flex justify-content-center flex-column align-items-center">
{{--                    <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><title>Profile</title><path fill-rule="evenodd" clip-rule="evenodd" d="M4.688 4.5h14.625c.103 0 .187.084.187.188v14.625a.187.187 0 01-.188.187H4.688a.187.187 0 01-.187-.188V4.688c0-.103.084-.187.188-.187zM3 4.688C3 3.756 3.756 3 4.688 3h14.625C20.244 3 21 3.756 21 4.688v14.625c0 .931-.756 1.687-1.688 1.687H4.688A1.687 1.687 0 013 19.312V4.688zm8.938 9.687a2.437 2.437 0 100-4.875 2.437 2.437 0 000 4.875zm3.937-2.438a3.939 3.939 0 01-3.153 3.86.752.752 0 01.028.203v.75a.75.75 0 01-1.5 0V16a.75.75 0 01.022-.181 3.939 3.939 0 114.603-3.882z" fill="currentColor"></path></svg>--}}
                    <img width="27" alt="trade" src="{{ asset('images/avatar.png') }}">
                    <span>Profile</span>
                </div>
            </a>
            {{--@can('manage_users')
                <a href="{{ route('admin-panel') }}" class="nav-home text-decoration-none  bottom-nav-logo">
                    --}}{{-- <img  src="{{asset('/storage/images/attachments/home.png')}}" alt="home">--}}{{--
                    <div class="bottom-nav-logo">
                        <div class="svg-menu">
                            <svg style="width: 24px;margin-top: 4px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                 fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                      d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </a>
            @endcan--}}
        </div>
    </div>
</div>
<style>
    #nav-top {
        height: var(--nav-height);
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: space-between;
        /*border-bottom-width: 0;*/
        /*border-bottom-style: solid;*/
        font-size: 15px;
        padding: 5px;
        font-family: "Khalid", sans-serif;
        /*background: no-repeat rgb(44, 44, 44);*/
        box-shadow: 0 13px 10px -6px rgba(0, 0, 0, .4);
    }

    #nav-bottom .bottom-nav-logo {
        fill: #ffffff;
        color: #ffffff;
    }

    .bottom-nav-logo.active .bottom-nav-logo svg, .bottom-nav-logo.active .bottom-nav-logo span {
        color: #10cef2;
        fill: #10cef2;
    }

    @media (min-width: 800px) {
        .mobile {
            width: 450px;
            margin: 0 auto;
        }
    }
</style>
<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
    window.__lc = window.__lc || {};
    window.__lc.license = 15497301;
    ;(function (n, t, c) {
        function i(n) {
            return e._h ? e._h.apply(null, n) : e._q.push(n)
        };
        var e = {
            _q: [], _h: null, _v: "2.0", on: function () {
                i(["on", c.call(arguments)])
            }, once: function () {
                i(["once", c.call(arguments)])
            }, off: function () {
                i(["off", c.call(arguments)])
            },
            get: function () {
                if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
                return i(["get", c.call(arguments)])
            }, call: function () {
                i(["call", c.call(arguments)])
            }, init: function () {
                var n = t.createElement("script");
                n.async = !0, n.type = "text/javascript",
                    n.src = "https://cdn.livechatinc.com/tracking.js", t.head.appendChild(n)
            }
        };
        !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
    }(window, document, [].slice))
</script>
<noscript>
    <a href="https://www.livechatinc.com/chat-with/15497301/" rel="nofollow">Chat with us</a>,
    powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a>
</noscript>
<!-- End of LiveChat code -->
</body>

</html>
