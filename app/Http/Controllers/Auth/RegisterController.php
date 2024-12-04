<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Services\TeamService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers {
        register as registration;
    }
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    public function showRegistrationForm(Request $request)
    {
        return view('auth.register', [
            'referral_code' => $request->get('referral_code')
        ]);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'              => ['required', 'string', 'max:255'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username'          => ['required', 'alpha_dash', 'max:255', 'unique:users,username'],
            'password'          => ['required', 'string', 'min:8', 'max:32'],
            'referral_code'     => ['required', 'nullable', 'string', 'exists:teams'],
            'telephone'         => ['required', 'string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return
     */
    protected function create(array $data)
    {
        $teamService = new TeamService();

        return $teamService->handle($data);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        /*$google2fa = app('pragmarx.google2fa');
        $registration_data = $request->all();
        $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();
        $request->session()->flash('registration_data', $registration_data);
        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $registration_data['email'],
            $registration_data['google2fa_secret']
        );
        return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);*/
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);
        $user->payment_password = $request->password;
        $user->user_id = $this->generateUniqueUserId();
        $user->save();
        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }
    /**

     * Write code on Method

     *

     * @return response()

     */

    public function completeRegistration(Request $request)
    {
        $request->merge(session('registration_data'));
        return $this->re($request);
    }
    function generateUniqueUserId()
    {
        $maxAttempts = 10; // Maximum attempts to generate a unique ID

        for ($attempt = 1; $attempt <= $maxAttempts; $attempt++) {
            $userId = mt_rand(100000, 999999); // Random 6-digit number

            // Check if the generated ID is unique
            if (!$this->userIdExists($userId)) {
                return $userId;
            }
        }

        // Handle the case when a unique ID couldn't be generated after max attempts
        // You can throw an exception, log an error, or take other actions as needed.
        // In this example, we'll return null.
        return null;
    }

    private function userIdExists($userId)
    {
        // Check if the generated user ID already exists in the database
        return User::where('user_id', $userId)->exists();
    }
}
