@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('user-menu') }}" class="text-decoration-none ">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection

@section('title')
    <div>My Profile</div>
@endsection

@section('content')
    @if(session()->has('success') || session()->has('error') )
        <toast-dynamic :message="'{{ session()->get('success') }}'"
                       :error="'{{ session()->get('error') }}'"></toast-dynamic>
    @endif
        <div class="container mt-4 let-main-profile-page">
			<div class="let-profile-page-lists">
				<a href="/change-password" class="row p-2 align-items-center  text-decoration-none border-bottom-menu">
					<div class="col-2">
						<div class="wallet-icons">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
								 stroke="currentColor" class="w-6 h-6">
								<path stroke-linecap="round" stroke-linejoin="round"
									  d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z"/>
							</svg>
						</div>
					</div>
					<div class="col-8">Change Password</div>
					<div class="col-2">
						<div class="arrow-next">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
								<path fill-rule="evenodd"
									  d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
									  clip-rule="evenodd"/>
							</svg>
						</div>
					</div>
				</a>
				<a href="/payment-password" class="row p-2 align-items-center  text-decoration-none border-bottom-menu">
					<div class="col-2">
						<div class="wallet-icons">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
								<path fill-rule="evenodd"
									  d="M12 3.75a6.715 6.715 0 00-3.722 1.118.75.75 0 11-.828-1.25 8.25 8.25 0 0112.8 6.883c0 3.014-.574 5.897-1.62 8.543a.75.75 0 01-1.395-.551A21.69 21.69 0 0018.75 10.5 6.75 6.75 0 0012 3.75zM6.157 5.739a.75.75 0 01.21 1.04A6.715 6.715 0 005.25 10.5c0 1.613-.463 3.12-1.265 4.393a.75.75 0 01-1.27-.8A6.715 6.715 0 003.75 10.5c0-1.68.503-3.246 1.367-4.55a.75.75 0 011.04-.211zM12 7.5a3 3 0 00-3 3c0 3.1-1.176 5.927-3.105 8.056a.75.75 0 11-1.112-1.008A10.459 10.459 0 007.5 10.5a4.5 4.5 0 119 0c0 .547-.022 1.09-.067 1.626a.75.75 0 01-1.495-.123c.041-.495.062-.996.062-1.503a3 3 0 00-3-3zm0 2.25a.75.75 0 01.75.75A15.69 15.69 0 018.97 20.738a.75.75 0 01-1.14-.975A14.19 14.19 0 0011.25 10.5a.75.75 0 01.75-.75zm3.239 5.183a.75.75 0 01.515.927 19.415 19.415 0 01-2.585 5.544.75.75 0 11-1.243-.84 17.912 17.912 0 002.386-5.116.75.75 0 01.927-.515z"
									  clip-rule="evenodd"/>
							</svg>
						</div>
					</div>
					<div class="col-8">Payment Password</div>
					<div class="col-2">
						<div class="arrow-next">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
								<path fill-rule="evenodd"
									  d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z"
									  clip-rule="evenodd"/>
							</svg>
						</div>
					</div>
				</a>
			</div>
            <div class="row justify-content-center">
                    <div class="card-background p-2 bg-fade-dark">
                        <div class="card-body ">
                            <form method="POST" action="{{ route('profile.update') }}">
                                @csrf
                                <div class="row mb-1">
                                <h3 class="form-title text-center text-white">Update Profile</h3>
                                </div>
                                <div class="mb-3">
                                    <label for="currentPassword" class="col-12 col-form-label text-white">
                                        {{ __('Name') }}
                                    </label>
                                    <div class="col-12">
                                        <div class="webflow-style-input">
                                            <input id="full_name" type="text"
                                                   class="@error('full_name') is-invalid @enderror"
                                                   name="full_name" value="{{ old('full_name', $user->name) }}" required
                                                   autocomplete="full_name" autofocus>
                                        </div>

                                        @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="col-12 col-form-label text-white">
                                        {{ __('Email') }}
                                    </label>

                                    <div class="col-12">
                                        <div class="webflow-style-input">
                                            <input id="email" type="text"
                                                   class="@error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email', $user->email) }}" required
                                                   autocomplete="email" autofocus>
                                        </div>
                                        <span class="help" style="margin-left: 10px">
                                            If you change the email you should verify email otherwise you can not use your account.
                                        </span>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <button class="button-14" type="submit" role="button">
                                        <span class="text">Update</span>
                                        <span class="button-14-background blue"></span>
                                        <!-- mask-border fallback -->
                                        <svg style="position: absolute;" width="0" height="0">
                                            <filter id="remove-black-button-14" color-interpolation-filters="sRGB">
                                                <feColorMatrix type="matrix" values="1 0 0 0 0
        0 1 0 0 0
        0 0 1 0 0
        -1 -1 -1 0 1" result="black-pixels"></feColorMatrix>
                                                <feComposite in="SourceGraphic" in2="black-pixels" operator="out"></feComposite>
                                            </filter>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
@endsection
