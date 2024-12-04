<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePasswordRequest;
use App\Http\Requests\StorePaymentPasswordRequest;
use App\Mail\OtpMail;
use App\Models\OtpTable;
use App\Models\Rewards;
use App\Models\User;
use App\Services\VerificationCodeService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PragmaRX\Google2FALaravel\Support\Authenticator;

class UserMenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function leftMenu(){
        return view('left-menu');
    }

    public function index()
    {
        $user = User::with('wallet')->find(auth()->id());

        return view('user-menu', [
            'user' => json_encode($user),
            'wallet' => json_encode($user['wallet']),
        ]);
    }

    public function privacyPolicy()
    {
        return view('helper.privacy');
    }

    public function changePassword()
    {
        \Google2FA::logout();
        return view('auth.change-password', ['phoneNumber' => Auth::user()->phone_number]);
    }

    public function storeNewPassword(StorePasswordRequest $storePasswordRequest)
    {
        $user = Auth::user();
        $data = $storePasswordRequest->validated();
        $storePasswordRequest->merge(['one_time_password' => $data['verificationCode']]);
        $authenticator = app(Authenticator::class)->boot($storePasswordRequest);
        if (!$authenticator->isAuthenticated()){
            throw \Illuminate\Validation\ValidationException::withMessages(['one_time_password' => "The 'One Time Password' typed was wrong."]);
        }
        try {
            /*$otpResMsgs = [
                'not-existing' => 'The user has not generated an OTP code.',
                'code-no-match' => 'The OTP code given is outdated. Please refer to your email for the most recent code.',
                'code-expired' => 'The OTP code given is expired. Please regenerate a new OTP code.',
            ];

            $otpRes = $this->validateOTP($data['verificationCode']);

            if ($otpRes != 'valid') {
                return redirect()->back()->with('error', $otpResMsgs[$otpRes]);
            }*/

            $user->update([
                'password' => Hash::make($data['newPassword']),
            ]);

            return redirect()->back()->with('success', 'Updated your password successfully !');
        } catch (Exception $exception) {
            Log::error('Password change fail' . $exception);
            return redirect()->back()->with('error', 'Cannot change your password !');
        }
    }

    public function paymentPassword(Request $request)
    {
        $user = Auth::user();
        \Google2FA::logout();
        return view('auth.payment-password', [
            'paymentPassword' => $user->payment_password,
            'phoneNumber' => $user->phone_number
        ]);

    }

    public function getPaymentPassword(StorePaymentPasswordRequest $passwordRequest)
    {

        $data = $passwordRequest->validated();
        $passwordRequest->merge(['one_time_password' => $data['verificationCode']]);
        $authenticator = app(Authenticator::class)->boot($passwordRequest);
        if (!$authenticator->isAuthenticated()){
            throw \Illuminate\Validation\ValidationException::withMessages(['one_time_password' => "The 'One Time Password' typed was wrong."]);
        }
        $user = Auth::user();
        /*$otpResMsgs = [
            'not-existing' => 'The user has not generated an OTP code.',
            'code-no-match' => 'The OTP code given is outdated. Please refer to your email for the most recent code.',
            'code-expired' => 'The OTP code given is expired. Please regenerate a new OTP code.',
        ];*/

        try {

            if($data['newPassword'] != $data['repeatPassword'])
                return redirect()->back()->with('error', 'New Password and confirm password does not match!');

//            $otpRes = $this->validateOTP($data['verificationCode']);

//            if ($otpRes != 'valid') {
//                return redirect()->back()->with('error', $otpResMsgs[$otpRes]);
//            }

            $user->update([
                'payment_password' => $data['newPassword'],
            ]);

            return redirect()->back()->with('success', 'Generated a new payment password !');

        } catch (Exception $exception) {
            Log::error('Error generating payment password' . $exception);

            return redirect()->back()->with('error', 'Error Generating a new payment password !');
        }
    }

    private function validateOTP($code){

        /*$request->merge(['one_time_password', $code]);
        $authenticator = app(Authenticator::class)->boot($request);
        dd($authenticator->isAuthenticated());*/
        $otp = OtpTable::where('user_id', Auth::user()->id)->first();
        if(!$otp) return 'not-existing';
        if($otp->code != str_replace('-', '', $code)) return 'code-no-match';
        return Carbon::now()->gt($otp->updated_at->addMinutes(2)) ? 'code-expired' : 'valid';
    }

    public function sendOTPcode(Request $request){
        try {
            $reason = $request->reason ?? '';

            $otp = OtpTable::where('user_id', Auth::user()->id)->first();
            if(!$otp){
                $otp = new OtpTable();
                $otp->user_id = Auth::user()->id;
            }

            $otp->code = Str::random(6);
            $otp->save();

            Mail::to(Auth::user()->email)->send(new OtpMail($otp, Auth::user(), $reason));

            return response()->json(['success' => 'ok']);
        } catch(Exception $exception){
            Log::error('Error generating OTP code' . $exception);
            return response()->json(['error' => 'Could Not Create OTP code!']);
        }
    }
}
