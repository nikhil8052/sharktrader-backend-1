<!DOCTYPE html>
<html>
<head>
    <title>{{ config('mail.from.address') }}</title>
</head>
<body>
<h2 style="text-align: center; color: #0c4128;"> {{ config('app.name') }} </h2>

<div style="border-bottom: 1px solid black; padding-bottom: 3px;">
    User : {{ $user->email }}
</div>
<div style="border-bottom: 1px solid black;  padding-bottom: 3px;">
    Phone number : {{ $user->phone_number }}
</div>
<div style="border-bottom: 1px solid black;  padding-bottom: 3px;">
    Amount Requested : {{ $withdraw->amount }}
</div>
<div style="border-bottom: 1px solid black ;  padding-bottom: 3px;">
    Withdraw Address : {{ $withdraw->withdraw_address }}
</div>
<p class="text-center">Thank you !</p>


</body>
</html>
