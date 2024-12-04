<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\Checkin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function show(): array
    {
        return $this->userResponse(auth()->getToken()->get());
    }

    public function store(StoreRequest $request): array
    {
        $user = $this->user->create($request->validated()['user']);

        auth()->login($user);

        return $this->userResponse(auth()->refresh());
    }

    public function update(UpdateRequest $request): array
    {
        auth()->user()->update($request->validated()['user']);

        return $this->userResponse(auth()->getToken()->get());
    }

    public function login(LoginRequest $request): array
    {
        if ($token = auth()->attempt($request->validated()['user'])) {
            return $this->userResource($token);
        }

        abort(Response::HTTP_FORBIDDEN);
    }

    protected function userResponse(string $jwtToken): array
    {
        return ['user' => ['token' => $jwtToken] + auth()->user()->toArray()];
    }
    public function require2fa(Request $request){
        return view('google2fa.index');
    }
    public function setup2faScreen(Request $request){
        return view('google2fa.screen');
    }
    public function setup2fa(Request $request)
    {
        $google2fa = app('pragmarx.google2fa');

        $user = auth()->user();
//        if ($user->google2fa_secret != ''){
//            return redirect()->route('home');
//        }
        $registration_data = [];
        $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();
        $registration_data["email"] = $user->email;

        $request->session()->flash('registration_data', $registration_data);

        $QR_Image = $google2fa->getQRCodeInline(
            'SpiderWeb Trade',
            $registration_data["email"],
            $registration_data["google2fa_secret"]
        );

        return view('google2fa.update', ['QR_Image' => $QR_Image, 'secret' => $registration_data["google2fa_secret"]]);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update2fa(Request $request)
    {
        $input = session('registration_data');
        $user = auth()->user();
        if ($input == '' || !is_array($input)){
            if ($user->google2fa_secret == ''){
                return redirect()->route('complete.2fa');
            }else{
                return redirect()->route('home');
            }
        }

        $request->merge(session('registration_data'));
        if ($request->google2fa_secret == ''){
            return redirect()->route('complete.2fa');
        }
//        eyJpdiI6IkN2ZXUwZEZBRHFNOHNmQ3lhV01hK3c9PSIsInZhbHVlIjoiVEhXZGNWOWp0dzRTRyt3UHZXNHZ2bEpiMU9LNnh4OUxzNGlGMnRzc0hBTT0iLCJtYWMiOiJkZDMxODBlMTMyZjVkNTQ1ZTQ1YTA5NWU3Y2JhZWUyYmU0MDIwMjIxZWY4ZDU3YzA2ODM5MzMxN2RjMGU5OGMxIiwidGFnIjoiIn0=
        $user->google2fa_secret = $request->google2fa_secret;
        $user->save();
        return redirect()->route('home');
    }
    public function checkin(){
        $user = auth()->user();
        $today = Carbon::today()->toDateString();
        $records = Checkin::where('user_id', $user->id)->whereDate('created_at', $today)->exists();
        $response = [];
        if (!$records){
            $user->checkins()->create();
            $response['status'] = true;
            $response['message'] = 'Checked in successfully.';
        }else{
            $response['status'] = false;
            $response['message'] = 'Already checked in.';
        }
        return \response()->json($response, 200);
    }

}
