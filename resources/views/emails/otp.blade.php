<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'SpiderWeb') }} | Opt Code</title>
</head>
<body style="text-align: center;">
    <h4>Dear {{$user->name}},</h4>

    <p>Thank you for using our application. We have received your request for an OTP code.</p>


    <p>Your OTP code is:</p>
    <h3>{{ str_split($otp->code, 3)[0] }}<span style="user-select: none;">-</span>{{ str_split($otp->code, 3)[1] }}</h3>

    <p>
        Please use this code to complete your requested action within two minutes.
        Please note that this OTP code is valid for a single use only and will expire after the designated time frame.
    </p>

    <p>
        If you did not request an OTP code,
        please disregard this email and contact our customer support
         team immediately at <b><a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a></b>.
    </p>

    <p>Thank you for choosing our application.</p>

    <p>Best regards,</p>
    <p>{{config('app.name')}}</p>

<p class="text-center">Thank you !</p>

</body>
</html>
