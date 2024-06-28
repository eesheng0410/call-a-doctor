<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],

        'patient' => [
            'driver' => 'session',
            'provider' => 'patients',
        ],

        'clinic' => [
            'driver' => 'session',
            'provider' => 'clinics',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'patients' => [
            'driver' => 'eloquent',
            'model' => App\Models\Patient::class,
        ],

        'clinics' => [
            'driver' => 'eloquent',
            'model' => App\Models\Clinic::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'patients' => [
            'provider' => 'patients',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'clinics' => [
            'provider' => 'clinics',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
