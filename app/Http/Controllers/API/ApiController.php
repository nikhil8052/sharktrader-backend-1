<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListStrategy;
use App\Models\Shark;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

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

        // Return the sharks data along with the first present shark
        return response()->json([
            'sharks' => Shark::all(), // All sharks associated with the user
            'present' => $present->first(), // The first present shark
            'user' => $user, // The authenticated user
        ], 200);
    }
}
