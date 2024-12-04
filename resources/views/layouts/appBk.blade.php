<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> SharkTrades</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo-fav-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo-fav-icon.png') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Audiowide|Iceland|Monoton|Pacifico|Press+Start+2P|Vampiro+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/4lm625ygbsn47ft7n9jebje7yve8n5l5ucy7xo5v1spzam0j/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script src="{{ mix('js/app1.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <style>
        @font-face {
            font-family: 'Mplus2p';
            src: url('{{ asset('fonts/mplus-2p-black.ttf') }}') format('truetype');
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
    @stack('head')

</head>

<body>

    <div id="app" class="mobile">
        <nav class="navbar background-img-nav">
            <div id="nav-top" class="border-b border-gradient border-gradient-blue">
                <div class="container d-flex justify-content-between flex-wrap align-items-center">
                    <div id="first-nav-container">
                        <a id="youtube-svg-container" href="{{ route('home') }}">
                            <img style="width: auto;height: 40px;text-align: left;position: absolute;left: 10px;top: 50%;transform: translateY(-50%);" src="{{ asset('/images/spider.svg') }}" alt="logo">
                        </a>
                        <div class="rainbow-text" style="font-family: MPLUS2P; margin-top: 8px; margin-left: 35px">
                            <a href="{{ route('home') }}" style="text-decoration: none">{{ config('app.name') }}</a>
                        </div>
                    </div>
                    <div class="menu-tutorial-wrapper d-flex justify-content-around">
{{--                        <a href="javascript:void(0)" onClick="chat()" class="d-flex justify-content-end  menu-tutorial">--}}
                        @can('manage_users')
                            <a href="{{ route('admin-panel') }}" class="d-flex justify-content-end  menu-tutorial">
                                {{-- <img  src="{{asset('/storage/images/attachments/home.png')}}" alt="home">--}}
                                <div class="bottom-nav-logo">
                                    <div class="svg-menu">
                                        <svg style="width: 30px; margin-top: 4px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path d="M17.004 10.407c.138.435-.216.842-.672.842h-3.465a.75.75 0 01-.65-.375l-1.732-3c-.229-.396-.053-.907.393-1.004a5.252 5.252 0 016.126 3.537zM8.12 8.464c.307-.338.838-.235 1.066.16l1.732 3a.75.75 0 010 .75l-1.732 3.001c-.229.396-.76.498-1.067.16A5.231 5.231 0 016.75 12c0-1.362.519-2.603 1.37-3.536zM10.878 17.13c-.447-.097-.623-.608-.394-1.003l1.733-3.003a.75.75 0 01.65-.375h3.465c.457 0 .81.408.672.843a5.252 5.252 0 01-6.126 3.538z" />
                                            <path fill-rule="evenodd" d="M21 12.75a.75.75 0 000-1.5h-.783a8.22 8.22 0 00-.237-1.357l.734-.267a.75.75 0 10-.513-1.41l-.735.268a8.24 8.24 0 00-.689-1.191l.6-.504a.75.75 0 10-.964-1.149l-.6.504a8.3 8.3 0 00-1.054-.885l.391-.678a.75.75 0 10-1.299-.75l-.39.677a8.188 8.188 0 00-1.295-.471l.136-.77a.75.75 0 00-1.477-.26l-.136.77a8.364 8.364 0 00-1.377 0l-.136-.77a.75.75 0 10-1.477.26l.136.77c-.448.121-.88.28-1.294.47l-.39-.676a.75.75 0 00-1.3.75l.392.678a8.29 8.29 0 00-1.054.885l-.6-.504a.75.75 0 00-.965 1.149l.6.503a8.243 8.243 0 00-.689 1.192L3.8 8.217a.75.75 0 10-.513 1.41l.735.267a8.222 8.222 0 00-.238 1.355h-.783a.75.75 0 000 1.5h.783c.042.464.122.917.238 1.356l-.735.268a.75.75 0 10.513 1.41l.735-.268c.197.417.428.816.69 1.192l-.6.504a.75.75 0 10.963 1.149l.601-.505c.326.323.679.62 1.054.885l-.392.68a.75.75 0 101.3.75l.39-.679c.414.192.847.35 1.294.471l-.136.771a.75.75 0 101.477.26l.137-.772a8.376 8.376 0 001.376 0l.136.773a.75.75 0 101.477-.26l-.136-.772a8.19 8.19 0 001.294-.47l.391.677a.75.75 0 101.3-.75l-.393-.679a8.282 8.282 0 001.054-.885l.601.504a.75.75 0 10.964-1.15l-.6-.503a8.24 8.24 0 00.69-1.191l.735.268a.75.75 0 10.512-1.41l-.734-.268c.115-.438.195-.892.237-1.356h.784zm-2.657-3.06a6.744 6.744 0 00-1.19-2.053 6.784 6.784 0 00-1.82-1.51A6.704 6.704 0 0012 5.25a6.801 6.801 0 00-1.225.111 6.7 6.7 0 00-2.15.792 6.784 6.784 0 00-2.952 3.489.758.758 0 01-.036.099A6.74 6.74 0 005.251 12a6.739 6.739 0 003.355 5.835l.01.006.01.005a6.706 6.706 0 002.203.802c.007 0 .014.002.021.004a6.792 6.792 0 002.301 0l.022-.004a6.707 6.707 0 002.228-.816 6.781 6.781 0 001.762-1.483l.009-.01.009-.012a6.744 6.744 0 001.18-2.064c.253-.708.39-1.47.39-2.264a6.74 6.74 0 00-.408-2.308z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        @endcan
                       {{-- <a href="https://t.me/eternity_support_bot" class="d-flex justify-content-end  menu-tutorial">
                            <div class="wallet-icons">
                                <img width="30" src="/images/telegram_logo.webp" alt="" style="margin-top: 5px">
                            </div>
--}}{{--                            <div class="text-white">Support Chat</div>--}}{{--
                        </a>--}}
                    </div>
                </div>
{{--                <div id="scroll-bar"></div>--}}
            </div>
        </nav>

        <main style="padding-bottom: 83px;padding-top: 55px;">
            <div class="glow-element"></div>
            @yield('content')
        </main>

        <div id="nav-bottom" class=" text-decoration-none">
            <div class="container container-bottom-icons pt-2">
{{--                <a href="/l-menu" class="nav-home text-decoration-none  bottom-nav-logo">--}}
{{--                    <div class="bottom-nav-logo">--}}
{{--                    <svg style="width: 30px;margin-top: 4px;height: 30px;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
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
                <a href="/exchange" class="nav-home text-decoration-none  bottom-nav-logo {{ request()-> url() === 'http://127.0.0.1:8000/exchange' ? 'active' : '' }}">
                    {{-- <img  src="{{asset('/storage/images/attachments/exchange.png')}}" alt="exchange">--}}
                    <div class="bottom-nav-logo d-flex justify-content-center flex-column align-items-center">
                        <!-- <svg style="width: 30px;margin-top: 4px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M12 5.25c1.213 0 2.415.046 3.605.135a3.256 3.256 0 013.01 3.01c.044.583.077 1.17.1 1.759L17.03 8.47a.75.75 0 10-1.06 1.06l3 3a.75.75 0 001.06 0l3-3a.75.75 0 00-1.06-1.06l-1.752 1.751c-.023-.65-.06-1.296-.108-1.939a4.756 4.756 0 00-4.392-4.392 49.422 49.422 0 00-7.436 0A4.756 4.756 0 003.89 8.282c-.017.224-.033.447-.046.672a.75.75 0 101.497.092c.013-.217.028-.434.044-.651a3.256 3.256 0 013.01-3.01c1.19-.09 2.392-.135 3.605-.135zm-6.97 6.22a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.752-1.751c.023.65.06 1.296.108 1.939a4.756 4.756 0 004.392 4.392 49.413 49.413 0 007.436 0 4.756 4.756 0 004.392-4.392c.017-.223.032-.447.046-.672a.75.75 0 00-1.497-.092c-.013.217-.028.434-.044.651a3.256 3.256 0 01-3.01 3.01 47.953 47.953 0 01-7.21 0 3.256 3.256 0 01-3.01-3.01 47.759 47.759 0 01-.1-1.759L6.97 15.53a.75.75 0 001.06-1.06l-3-3z" clip-rule="evenodd" />
                        </svg> -->
<!--                        <svg style="margin-top: 4px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="24" height="24"><path d="M 20 4 C 15.054545 4 11 8.0545455 11 13 L 11 35.585938 L 5.7070312 30.292969 L 4.2929688 31.707031 L 12 39.414062 L 19.707031 31.707031 L 18.292969 30.292969 L 13 35.585938 L 13 13 C 13 12.759091 13.01313 12.521884 13.037109 12.287109 C 13.396795 8.7654918 16.386364 6 20 6 L 30 6 L 30.5 6 L 30.5 4 L 30 4 L 20 4 z M 38 10.585938 L 30.292969 18.292969 L 31.707031 19.707031 L 37 14.414062 L 37 37 C 37 40.613636 34.234508 43.603205 30.712891 43.962891 C 30.478116 43.98687 30.240909 44 30 44 L 20 44 L 19.5 44 L 19.5 46 L 20 46 L 30 46 C 30.309091 46 30.614657 45.984029 30.916016 45.953125 C 35.436391 45.489569 39 41.636364 39 37 L 39 14.414062 L 44.292969 19.707031 L 45.707031 18.292969 L 38 10.585938 z"/></svg>-->
                        <img width="28" alt="trade" src="{{ asset('images/candlestick-chart.png') }}">
                        <span>Trade</span>
                    </div>
                </a>
                <a href="{{ route('home') }}" class="nav-home middle text-decoration-none  bottom-nav-logo {{ request()->fullUrl() === route('home') ? 'active' : ''}}">
                    <div class="bottom-nav-logo d-flex justify-content-center flex-column align-items-center">
                        <img  src="{{asset('images/home.png')}}" alt="home" width="28" height="28">
                    </div>
                </a>
                <a href="{{ route('user-menu') }}" class="nav-home text-decoration-none  bottom-nav-logo {{ request()->fullUrl() === route('user-menu') ? 'active' : ''}}">
                    {{-- <img  src="{{asset('/storage/images/attachments/my-menu.png')}}" alt="menu">--}}
                    <div class="bottom-nav-logo d-flex justify-content-center flex-column align-items-center">
{{--                        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><title>Profile</title><path fill-rule="evenodd" clip-rule="evenodd" d="M4.688 4.5h14.625c.103 0 .187.084.187.188v14.625a.187.187 0 01-.188.187H4.688a.187.187 0 01-.187-.188V4.688c0-.103.084-.187.188-.187zM3 4.688C3 3.756 3.756 3 4.688 3h14.625C20.244 3 21 3.756 21 4.688v14.625c0 .931-.756 1.687-1.688 1.687H4.688A1.687 1.687 0 013 19.312V4.688zm8.938 9.687a2.437 2.437 0 100-4.875 2.437 2.437 0 000 4.875zm3.937-2.438a3.939 3.939 0 01-3.153 3.86.752.752 0 01.028.203v.75a.75.75 0 01-1.5 0V16a.75.75 0 01.022-.181 3.939 3.939 0 114.603-3.882z" fill="currentColor"></path></svg>--}}
                        <img width="27" alt="trade" src="{{ asset('images/avatar.png') }}">
                        <span>Profile</span>
                    </div>
                </a>
{{--                @can('manage_users')--}}
{{--                    <a href="{{ route('admin-panel') }}" class="nav-home text-decoration-none  bottom-nav-logo">--}}
{{--                        --}}{{-- <img  src="{{asset('/storage/images/attachments/home.png')}}" alt="home">--}}
{{--                        <div class="bottom-nav-logo">--}}
{{--                            <div class="svg-menu">--}}
{{--                                <svg style="width: 30px; margin-top: 4px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">--}}
{{--                                    <path d="M17.004 10.407c.138.435-.216.842-.672.842h-3.465a.75.75 0 01-.65-.375l-1.732-3c-.229-.396-.053-.907.393-1.004a5.252 5.252 0 016.126 3.537zM8.12 8.464c.307-.338.838-.235 1.066.16l1.732 3a.75.75 0 010 .75l-1.732 3.001c-.229.396-.76.498-1.067.16A5.231 5.231 0 016.75 12c0-1.362.519-2.603 1.37-3.536zM10.878 17.13c-.447-.097-.623-.608-.394-1.003l1.733-3.003a.75.75 0 01.65-.375h3.465c.457 0 .81.408.672.843a5.252 5.252 0 01-6.126 3.538z" />--}}
{{--                                    <path fill-rule="evenodd" d="M21 12.75a.75.75 0 000-1.5h-.783a8.22 8.22 0 00-.237-1.357l.734-.267a.75.75 0 10-.513-1.41l-.735.268a8.24 8.24 0 00-.689-1.191l.6-.504a.75.75 0 10-.964-1.149l-.6.504a8.3 8.3 0 00-1.054-.885l.391-.678a.75.75 0 10-1.299-.75l-.39.677a8.188 8.188 0 00-1.295-.471l.136-.77a.75.75 0 00-1.477-.26l-.136.77a8.364 8.364 0 00-1.377 0l-.136-.77a.75.75 0 10-1.477.26l.136.77c-.448.121-.88.28-1.294.47l-.39-.676a.75.75 0 00-1.3.75l.392.678a8.29 8.29 0 00-1.054.885l-.6-.504a.75.75 0 00-.965 1.149l.6.503a8.243 8.243 0 00-.689 1.192L3.8 8.217a.75.75 0 10-.513 1.41l.735.267a8.222 8.222 0 00-.238 1.355h-.783a.75.75 0 000 1.5h.783c.042.464.122.917.238 1.356l-.735.268a.75.75 0 10.513 1.41l.735-.268c.197.417.428.816.69 1.192l-.6.504a.75.75 0 10.963 1.149l.601-.505c.326.323.679.62 1.054.885l-.392.68a.75.75 0 101.3.75l.39-.679c.414.192.847.35 1.294.471l-.136.771a.75.75 0 101.477.26l.137-.772a8.376 8.376 0 001.376 0l.136.773a.75.75 0 101.477-.26l-.136-.772a8.19 8.19 0 001.294-.47l.391.677a.75.75 0 101.3-.75l-.393-.679a8.282 8.282 0 001.054-.885l.601.504a.75.75 0 10.964-1.15l-.6-.503a8.24 8.24 0 00.69-1.191l.735.268a.75.75 0 10.512-1.41l-.734-.268c.115-.438.195-.892.237-1.356h.784zm-2.657-3.06a6.744 6.744 0 00-1.19-2.053 6.784 6.784 0 00-1.82-1.51A6.704 6.704 0 0012 5.25a6.801 6.801 0 00-1.225.111 6.7 6.7 0 00-2.15.792 6.784 6.784 0 00-2.952 3.489.758.758 0 01-.036.099A6.74 6.74 0 005.251 12a6.739 6.739 0 003.355 5.835l.01.006.01.005a6.706 6.706 0 002.203.802c.007 0 .014.002.021.004a6.792 6.792 0 002.301 0l.022-.004a6.707 6.707 0 002.228-.816 6.781 6.781 0 001.762-1.483l.009-.01.009-.012a6.744 6.744 0 001.18-2.064c.253-.708.39-1.47.39-2.264a6.74 6.74 0 00-.408-2.308z" clip-rule="evenodd" />--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                @endcan--}}
            </div>
        </div>

    </div>
    <!-- Start of LiveChat (www.livechatinc.com) code -->
        <script type="text/javascript">
            window.__lc = window.__lc || {};
            window.__lc.license = 15497301;
            ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)};
            var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){
            i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},
            get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");
            return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){
            var n=t.createElement("script");
            n.async=!0,n.type="text/javascript",
            n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};
            !n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
        </script>
        <noscript>
            <a href="https://www.livechatinc.com/chat-with/15497301/" rel="nofollow">Chat with us</a>,
            powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a>
        </noscript>
            <!-- End of LiveChat code -->

    <script>
        function chat() {
            if (window.LC_API.chat_window_maximized()) {
                window.LC_API.minimize_chat_window()
            } else {
                window.LC_API.open_chat_window()
            }
        }
    </script>

</body>

</html>
<style>

</style>

