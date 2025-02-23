<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Esta opción controla el guard y la configuración de restablecimiento de
    | contraseña por defecto. En este caso, solo usamos el guard 'web'.
    |
    */

    'defaults' => [
        'guard' => 'web', // Cambiado de 'admin' a 'web'
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Definimos los guards de autenticación para los usuarios y administradores.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'administradores',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Definimos los proveedores de usuarios para los usuarios y administradores.
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'administradores' => [
            'driver' => 'eloquent',
            'model' => App\Models\Administrador::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Configuración para el restablecimiento de contraseñas de los usuarios.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Define el tiempo en segundos antes de que una confirmación de contraseña
    | expire y se requiera reingresar la clave.
    |
    */

    'password_timeout' => 10800,

];
