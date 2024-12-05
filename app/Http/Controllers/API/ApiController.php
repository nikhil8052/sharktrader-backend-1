<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListStrategy;
use App\Models\Shark;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use App\Http\Requests\BuySharkRequest;
use App\Services\UpdateUserAmountService;
use PragmaRX\Google2FALaravel\Support\Authenticator;

use App\Models\QuantTrade;



class ApiController extends Controller
{


    public function login(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Check if the credentials are correct
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Generate and return the token
            $user = Auth::user();
            $token = $user->createToken('YourAppName')->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'error' => 'Unauthorized'
            ], 401);
        }
    }

    public function getAllStrategies()
    {
        // Fetch all strategies
        $strategies = ListStrategy::all();
        
        // Return strategies as JSON response
        return successResponse(null,$strategies);
    }

    public function spiderWeb( Request $request){
        $user = $request->user();
        // Get the user's sharks, filtering by the ones that are present
        $present = $user->sharks->filter(function ($shark) {
            return $shark->pivot->present == true;
        });

        $data=[
            'sharks' => Shark::all(), // All sharks associated with the user
            'present' => $present->first(), // The first present shark
            'user' => $user, // The authenticated user
        ];

        return successResponse(null,$data);
    }


    public function spiderWebBuy(BuySharkRequest $request, UpdateUserAmountService $updateUserAmountService)
    {

        // Merge one-time password into the request
        $request->merge(['one_time_password' => $request->one_time_password]);

        // Initialize and boot the Authenticator
        $authenticator = app(Authenticator::class)->boot($request);

        // Check if the authenticator validated the OTP
        if (!$authenticator->isAuthenticated()) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'one_time_password' => "The 'One Time Password' typed was wrong."
            ]);
        }

        // Handle the user's request with validated data
        $result = $updateUserAmountService->handle($request->validated());

        // Return a JSON response
        return response()->json([
            'message' => 'Shark successfully purchased',
            'data' => $result,
        ], 200);
    }


    public function setup2fa(Request $request)
    {
        $google2fa = app('pragmarx.google2fa');

        $user = $request->user(); // Assuming API authentication
        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        // Generate the 2FA secret key
        $google2faSecret = $google2fa->generateSecretKey();

        // Prepare registration data
        $registrationData = [
            'google2fa_secret' => $google2faSecret,
            'email' => $user->email,
        ];

        // Generate the QR code
        $qrCode = $google2fa->getQRCodeInline(
            'YourAppName', // Replace with your app's name
            $registrationData['email'],
            $registrationData['google2fa_secret']
        );

        $data = [
            'message' => '2FA setup initiated',
            'qr_code' => $qrCode,
            'secret' => $registrationData['google2fa_secret'],
        ];

        return successResponse($data);
    }




    public function getQuantTrades()
    {
        // Fetch all records from the QuantTrade model
        $quants = QuantTrade::all();

        return successResponse("Operation completed successfully.",$quants);


    }


    public function getQuantTradesShow(QuantTrade $quantTrade)
    {
        // Get the authenticated user's sharks
        $userSharks = Auth::user()->sharks;

        // Filter the sharks to get only the active ones
        $quantiqFox = $userSharks->filter(function ($shark) {
            return $shark->pivot->active;
        });

        $data=[
            'success' => true,
            'quantiqFox' => $quantiqFox,
            'wallet' => Auth::user()->wallet,
            'quantTrade' => $quantTrade,
        ];

        // Return the data as JSON response
        return successResponse(null,$data);
        
    }



}
