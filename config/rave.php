<?php

return [

    'publicKey' => getenv('RAVE_PUBLIC_KEY'),
    'secretKey' => getenv('RAVE_SECRET_KEY'),
    'title' => env('RAVE_TITLE', 'Travel Max Hub'),
    'env' => env('RAVE_ENVIRONMENT', 'staging'),
    'logo' => env('RAVE_LOGO', ''),
    'prefix' => env('RAVE_PREFIX', 'tmh'),

];
