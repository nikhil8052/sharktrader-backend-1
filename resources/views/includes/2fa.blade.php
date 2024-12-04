<label for="verificationCode" class="col-12 gap-2 col-form-label text-white {{ (auth()->user()->google2fa_secret == null || auth()->user()->google2fa_secret == '') ? 'd-flex justify-content-around' : '' }}">
    <span>OTP Code</span>
    @if(auth()->user()->google2fa_secret == null || auth()->user()->google2fa_secret == '')
        <div class="d-flex gap-2" style="font-size: 0.75rem">You have not configured 2FA
            <a href="{{ route('complete.2fa') }}" class="btn btn-danger">
                Configure 2FA Now
            </a>
        </div>
    @endif
</label>
<div class="col-12">
    <div class="align-items-center">
        <div class="webflow-style-input">
            <input type="text" value="{{ old('verificationCode') }}" class="" id="verificationCode" name="verificationCode">
        </div>
        {{--                                    <email-verification :otpreason='"account-password"'></email-verification>--}}
        <p class="text-white pt-2 text-description" style="padding-left: 0;">Please enter the  <strong>OTP</strong> generated on your Authenticator App. <br> Ensure you submit the current one because it refreshes every 30 seconds.</p>
    </div>
    @error('verificationCode')
    <span style="color:red;" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    @error('one_time_password')
    <span style="color:red;" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
