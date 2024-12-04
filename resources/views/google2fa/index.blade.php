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
                    @if($errors->any())
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <strong>{{$errors->first()}}</strong>
                            </div>
                        </div>
                    @endif

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('2fa') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <p class="text-white">Please enter the  <strong>OTP</strong> generated on your Authenticator App. <br> Ensure you submit the current one because it refreshes every 30 seconds.</p>
                                <label for="one_time_password" class="col-md-4 control-label text-white">One Time Password</label>
                                <div class="col-md-12">
                                    <input id="one_time_password" type="number" class="input-background" name="one_time_password" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 mt-3 text-end">
                                    <button type="submit" class="menu-button w-100 mt-4 mb-2">
                                        Login
                                    </button>
                                    <a href="{{ route('complete.2fa') }}">Configure 2FA Now</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
