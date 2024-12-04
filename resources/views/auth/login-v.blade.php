<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Quantiq') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo-main.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo-main.png') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/4lm625ygbsn47ft7n9jebje7yve8n5l5ucy7xo5v1spzam0j/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ mix('js/app1.js') }}" defer></script>
    @stack('head')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap");

        :root {
            font-size: 100%;
            --white: oklch(100% 0 0);
            --primary-light: oklch(78.81% 0.109 255.212);
            --primary: oklch(58.63% 0.227 281.34);
            --primary-dark: oklch(47.56% 0.273 284.25);

            --greyLight-1: oklch(93.77% 0.015 257.2);
            --greyLight-2: oklch(85.86% 0.033 270.41);
            --greyDark: oklch(73.91% 0.056 267.7);

            --background: var(--greyLight-1);
            --onBackground: var(--greyDark);

            --surface: var(--primary);
            --onSurface: var(--white);
            --onSurface-Dark: oklch(58.2% 0.228 266.74);

            --shadow: 0.3rem 0.3rem 0.6rem var(--greyLight-2),
            -0.2rem -0.2rem 0.5rem var(--white);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Inter", sans-serif;
            background-color: var(--background);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
            margin: 0;
        }

        .container {
            background-color: var(--background);
            color: var(--onBackground);
            padding: 1.25rem 2.5rem;
            border-radius: 1.5rem;
            box-shadow: var(--shadow);
        }

        .container h1 {
            font-size: 1.8rem;
            text-align: center;
            padding-bottom: 1.25rem;
            font-weight: 600;
        }

        .container a {
            text-decoration: none;
            color: var(--onSurface-Dark);
        }

        .form-control {
            position: relative;
            margin: 1.25rem 0 2.5rem 0;
            background: transparent;
            border: none;
        }

        .form-control input {
            background-color: transparent;
            border: 0;
            border-bottom: 0.125rem var(--onBackground) solid;
            display: block;
            width: 100%;
            padding: 0.9rem;
            font-size: 1.2rem;
            color: var(--onBackground);
            font-weight: 400;
        }

        .form-control input:focus,
        .form-control input:valid {
            outline: 0;
            border-bottom-color: var(--greyLight-2);
        }

        .form-control label {
            position: absolute;
            top: 0.9rem;
            left: 0;
        }

        .form-control label span {
            display: inline-block;
            font-size: 1.2rem;
            min-width: 0.3rem;
            transition: 300ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .form-control input:focus + label span,
        .form-control input:valid + label span {
            color: var(--greyLight-2);
            transform: translateY(-1.875rem);
            font-size: 1rem;
        }

        .btn {
            cursor: pointer;
            display: inline-block;
            width: 100%;
            background: var(--surface);
            padding: 0.9rem;
            font-family: inherit;
            font-size: 1.2rem;
            border: 0;
            border-radius: 0.8rem;
            box-shadow: inset 0.2rem 0.2rem 1rem var(--primary-light),
            inset -0.2rem -0.2rem 1rem var(--primary-dark), var(--shadow);
            color: var(--greyLight-1);
            transition: 300ms ease;
            font-weight: 500;
        }

        .btn:focus {
            outline: 0;
        }

        .btn:hover {
            color: var(--onSurface);
        }

        .btn:active {
            box-shadow: inset 0.2rem 0.2rem 1rem var(--primary-dark),
            inset -0.2rem -0.2rem 1rem var(--primary-light);
            color: var(--onSurface);
        }

        .text {
            margin-top: 1.875rem;
            text-align: center;
            font-size: 0.8rem;
            font-weight: 400;
        }

    </style>

</head>

<body style="background: linear-gradient(90deg, rgb(121,106,204) 0%, rgb(78,255,255) 100%)">
    <div id="app" class="mobile">
        <main>
            <div class="d-flex justify-content-center m-0 mt-3">
                <img style="height:100px" src="{{ asset('/images/logo-main.png') }}" alt="Logo">
            </div>
            <div class="login-wrapper mt-5">
                <div class="container">
                    <h1>Login</h1>
                    <form>
                        <div class="form-control">
                            <input type="text" required name="email">
                            <label>Email</label>
                        </div>
                        <div class="form-control">
                            <input type="password" required name="password">
                            <label>Password</label>
                        </div>
                        <button class="btn">Login</button>
                        <p class="text">Don't have an account? <a href="#">Register</a></p>
                    </form>
                </div>
            </div>
        </main>

    </div>
<script>
    const labels = document.querySelectorAll('.form-control label')

    labels.forEach(label => {
        label.innerHTML = label.innerText
            .split('')
            .map((letter, index) => `<span style="transition-delay:${index * 40}ms">${letter}</span>`)
            .join('')
    })
</script>
</body>

</html>
<style>
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
</style>
