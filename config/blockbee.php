<?php

return [
    'callback'   => env('APP_URL')."/api/v1/deposits/confirm/invoice/",
    'api_key'    => env('BLOCKBEE_API_KEY'),
    'trc20/usdt' => env('TRC20'),
    'bep20/usdt' => env('BEP20'),
];
