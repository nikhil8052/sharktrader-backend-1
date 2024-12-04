<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class SMSClient
{
    public $recipient;
    public string $message;

    public function __construct($recipient, $message)
    {
        $this->recipient = $recipient;
        $this->message = $message;
    }

    public function sendSms(): void
    {
        $post_data = array(
            'sub_account'      => config('services.sms.SMS_SUB_ACCOUNT'),
            'sub_account_pass' => config('services.sms.SMS_ACCOUNT_PASSWORD'),
            'action'           => 'send_sms',
            'sender_id'        => "Quantiq",
            'recipients'       => $this->recipient,
            'message'          => $this->message
        );

        $api_url = 'https://cheapglobalsms.com/api_v1/';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($response_code != 200) $response = curl_error($ch);
        curl_close($ch);

        if ($response_code != 200) $msg = "HTTP ERROR $response_code: $response";
        else {
            $json = @json_decode($response, true);

            if ($json === null) $msg = "INVALID RESPONSE: $response";
            elseif (!empty($json['error'])) $msg = $json['error'];
            else {
                $msg = "SMS sent to " . $json['total'] . " recipient(s).";
                $sms_batch_id = $json['batch_id'];

            }
        }
        Log::info($msg);
    }
}
