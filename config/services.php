<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'firebase' => [
        'api_key' => "AIzaSyB7plMdLEI9IkHEYQIYHI_btxj5sYElhn8",
        'auth_domain' =>  "elsalamapp.firebaseapp.com",
        'database_url' =>"https://elsalamapp.firebaseio.com",
         'secret' =>  "elsalamapp",
        'storage_bucket' => "elsalamapp.appspot.com",
        'messagingSenderId'=>  "844700117021",
    ],
    'twilio' => [
        'sid' => env('TWILIO_AUTH_SID'),
        'token' => env('TWILIO_AUTH_TOKEN'),
        'whatsapp_from' => env('TWILIO_WHATSAPP_FROM')
      ],
      'chatapi' => [
        'token'          => env('CHATAPI_TOKEN', ''),
        'api_url'       => env('CHATAPI_URL', ''),
    ],
];
