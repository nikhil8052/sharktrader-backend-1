@extends('layouts.content-layout')

@section('previous-button')
    <a href="{{ route('home') }}" class="text-decoration-none text-white">
        <span class="material-icons">arrow_back_ios_new</span>
    </a>
@endsection
@section('title')
    <div class="text-white">OTP - Google Authenticator</div>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center mt-3">
            <div class="col-11">
                <div class="panel panel-default">
                    <h3 class="panel-heading font-weight-bold text-white text-center">Enter OTP</h3>
                    <hr>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('complete.2fa') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <p class="text-white">
                                    Please ensure that you haven't configured the OTP or it has been deleted. If you click the following button to reconfigure the OTP, your previous OTP session will expire, and only the new one will work.
                                </p>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 mt-3 text-end">
                                    <button type="submit" class="menu-button w-100 mt-4 mb-2">
                                        Configure 2FA Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
