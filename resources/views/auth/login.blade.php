<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SharkTrades</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo-fav-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo-main.png') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Audiowide|Iceland|Monoton|Pacifico|Press+Start+2P|Vampiro+One'
          rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/4lm625ygbsn47ft7n9jebje7yve8n5l5ucy7xo5v1spzam0j/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script src="{{ mix('js/app1.js') }}" defer></script>
	@stack('head')
    <style>
        .text-info {
            color: #ffffff !important;
        }

        .button-14 {
            width: 100%;
            padding: 5px !important;
            font-size: 20px;
        }

        input:-webkit-autofill,
        textarea:-webkit-autofill,
        select:-webkit-autofill {
            background-color: transparent !important;
            /* Set the background color you want for autofill */
        }
        @media (min-width: 800px) {
            .mobile {
                width: 450px;
                margin: 0 auto;
            }
        }

        .bottom-nav-logo {
            color: #ffffff;
            fill: #ffffff;
        }

        .background-img-nav {
            height: 3rem;
            width: 100%;
        }

        .card-background {
            padding-top: 10px;
            padding-bottom: 10px;
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
		
		
		//typing effect for login page
		 document.addEventListener("DOMContentLoaded", function() {
            var string = "Welcome to Shark Trades"; /* type your text here */
            var array = string.split("");
            var timer;

            function frameLooper() {
                if (array.length > 0) {
                    document.getElementById("typing-text").innerHTML += array.shift();
                } else {
                    clearTimeout(timer);
                    setTimeout(function() {
                        document.getElementById("typing-text").innerHTML = ""; // Clear the text
                        array = string.split(""); // Reset the array
                        frameLooper(); // Restart the loop
                    }, 3000); // Wait for 1 second before restarting
                    return; // Exit the function
                }
                timer = setTimeout(frameLooper, 70); /* change 70 for speed */
            }

            frameLooper();
        });
    </script>
    <!--End of Tawk.to Script-->
</head>

<body>
<div id="app" class="mobile">
    <main>
        <div class="d-flex justify-content-center m-0 mt-3 let-typing">
            <div><img style="height:75px" src="{{ asset('/images/logo-main.png') }}" alt="Logo"></div>
			<div id="typing-text"></div>
        </div>
        <div class="login-wrapper mt-3">
            <div class=" container">
                <div class="glow-element opacity-70"></div>
                <div class="row justify-content-center">
                    <div class="card-background bg-fade-dark">
                        <div class="card-body ">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row ">
                                    <h3 class="form-title text-center text-white">Login</h3>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="mb-2 fw-bold text-white">
                                            <span class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 32 32"
                                                     width="20" height="20"><path fill="#4effff" fill-rule="evenodd"
                                                                                  d="M16 4C12.6863 4 10 6.68629 10 10 10 13.3137 12.6863 16 16 16 19.3137 16 22 13.3137 22 10 22 6.68629 19.3137 4 16 4zM13 17.9297C11.1435 17.9297 9.36301 18.6672 8.05025 19.9799 6.7375 21.2927 6 23.0732 6 24.9297 6 25.7253 6.31607 26.4884 6.87868 27.051 7.44129 27.6136 8.20435 27.9297 9 27.9297H16C16.5523 27.9297 17 27.482 17 26.9297V26.2434C17 24.3869 17.7375 22.6064 19.0503 21.2936L20.7071 19.6368C20.9931 19.3508 21.0787 18.9207 20.9239 18.547 20.7691 18.1733 20.4045 17.9297 20 17.9297H13z"
                                                                                  clip-rule="evenodd"
                                                                                  class="color5233FF svgShape"></path><path
                                                        fill="#64ffff" fill-rule="evenodd"
                                                        d="M28.7105 20.1761C29.0991 20.5685 29.0961 21.2017 28.7037 21.5903L24.1304 26.1204C24.1303 26.1206 24.1305 26.1203 24.1304 26.1204C23.8871 26.3616 23.5983 26.5528 23.2816 26.6829C22.9647 26.813 22.6253 26.8799 22.2828 26.8799C21.9403 26.8799 21.601 26.813 21.2841 26.6829C20.9672 26.5528 20.6787 26.3618 20.4353 26.1204L20.4331 26.1183L19.2938 24.9817C18.9028 24.5917 18.902 23.9585 19.292 23.5675C19.6821 23.1765 20.3152 23.1757 20.7062 23.5658L21.8443 24.7011C21.901 24.757 21.9686 24.8019 22.0438 24.8328C22.1193 24.8638 22.2005 24.8799 22.2828 24.8799C22.3651 24.8799 22.4464 24.8638 22.5219 24.8328C22.5974 24.8018 22.6653 24.7566 22.7221 24.7003L27.2963 20.1694C27.6886 19.7808 28.3218 19.7838 28.7105 20.1761Z"
                                                        clip-rule="evenodd" class="colorFF64C8 svgShape"></path></svg>
                                            </span>
                                            <span class="text">
                                                {{ __('Email Address') }}
                                            </span>
                                    </label>

                                    <div>
                                        <div class="webflow-style-input">
                                            <input id="email" type="email" placeholder="{{ __('Email Address') }}"
                                                   class="@error('email') is-invalid @enderror" name="email"
                                                   value="{{ old('email') }}" required autocomplete="email">
                                        </div>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="mb-2 fw-bold text-white">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                                 height="20"><g data-name="Layer 2" fill="#000000"
                                                                class="color000 svgShape"><path fill="#4effff"
                                                                                                d="M19,10H5V8A7,7,0,0,1,19,8ZM7,8H17A5,5,0,0,0,7,8Z"
                                                                                                class="color6ca4ff svgShape"></path><path
                                                        fill="#05f1f1"
                                                        d="M19,20H5a4,4,0,0,1-4-4V12A4,4,0,0,1,5,8H19a4,4,0,0,1,4,4v4A4,4,0,0,1,19,20ZM5,10a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2H19a2,2,0,0,0,2-2V12a2,2,0,0,0-2-2Z"
                                                        class="color0554f1 svgShape"></path><path fill="#05f1f1"
                                                                                                  d="M19,9H5a3,3,0,0,0-3,3v4a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V12A3,3,0,0,0,19,9ZM6,15a1,1,0,1,1,1-1A1,1,0,0,1,6,15Zm4,0a1,1,0,1,1,1-1A1,1,0,0,1,10,15Zm4,0a1,1,0,1,1,1-1A1,1,0,0,1,14,15Zm4,0a1,1,0,1,1,1-1A1,1,0,0,1,18,15Z"
                                                                                                  class="color0554f1 svgShape"></path></g></svg>
                                        </span>
                                        <span class="text">
                                            {{ __('Password') }}
                                        </span>
                                    </label>

                                    <div>
                                        <div class="webflow-style-input">
                                            <input id="password" type="password" placeholder="{{ __('Password') }}"
                                                   class="@error('password') is-invalid @enderror" name="password"
                                                   required autocomplete="current-password">
                                        </div>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div
                                    class="d-flex justify-content-between align-items-center align-content-center mb-3">
                                    <div class="col-md-6 ">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label text-white fw-bold" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link text-white text-decoration-none"
                                               href="{{ route('password.request') }}" style="font-size: 1rem">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>

                                </div>

                                <div class="row mb-2">
                                    <div class="col-12 m-auto text-center">
                                        <button type="submit" class="button-14 w-full" role="button" style="margin-bottom: 0px !important;">
                                            <div class="text row">
                                                <div class="col-12">Login</div>
                                            </div>
                                            <span class="button-14-background blue"></span>
                                            <!--                <span class="button-14-border"></span>-->
                                            <!-- mask-border fallback -->
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
                                    </div>
                                    <div class="col-12 m-auto text-center">
                                        <a href="{{ route('register') }}" class="text-decoration-none">
                                            <button type="button" class="button-14 w-full" role="button" style="margin-bottom: 0px !important;">
                                                <div class="text row">
                                                    <div class="col-12">Sign Up</div>
                                                </div>
                                                <span class="button-14-background blue"></span>
                                                <!--                <span class="button-14-border"></span>-->
                                                <!-- mask-border fallback -->
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
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>

</html>
