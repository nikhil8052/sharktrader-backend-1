<?php

use Illuminate\Support\Facades\Http;
use PragmaRX\Google2FA\Google2FA;

function successResponse($data = [], $message = "Operation completed successfully.")
{
    return [
        'code' => 200,
        "message" => $message,
        'data' => $data,
    ];
}
function failedResponse($data = [], $msg = "Opertion failed ")
{
    return [
        'code' => 500,
        "message" => $msg,
        'data' => $data,
    ];
}

function callApi($url, $method = 'GET', $data = [], $token = true)
{
    // Set the headers for authentication (if required)
    $headers = [];
    if ($useAuth) {
        // Assuming you are using token-based authentication
        $headers = [
            'Accept' => 'application/json',
        ];
    }
    // Make the API call
    $response = Http::withHeaders($headers)->$method($url, $data);
    return $response;
}


// check the 2fa otp 
function Check2faPassword($otp=null , $google2fa_secret=null)
{
    // if(!$otp || !$google2fa_secret) return false ; 

    $google2fa = new Google2FA();
    $isOtpValid = $google2fa->verifyKey($google2fa_secret, $otp);
    if (!$isOtpValid) {
        return false;
    }
    return true;
}

?>
