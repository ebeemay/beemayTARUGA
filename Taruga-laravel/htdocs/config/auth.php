<?php

return [

// config/auth.php

'defaults' => [
    'guard' => 'web', // Guard padrão, geralmente o de Admin ou de acesso principal
    'passwords' => 'users',
],

'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],

    'student' => [
        'driver' => 'session',
        'provider' => 'students',
    ],

    'teacher' => [
        'driver' => 'session',
        'provider' => 'teachers',
    ],

    'institution' => [
        'driver' => 'session',
        'provider' => 'institutions',
    ],

    /*'admin' => [
        'driver' => 'session',
        'provider' => 'admins',
    ],*/
],

'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],

    'students' => [
        'driver' => 'eloquent',
        'model' => App\Models\Student::class,
    ],

    'teachers' => [
        'driver' => 'eloquent',
        'model' => App\Models\Teacher::class,
    ],

    'institutions' => [
        'driver' => 'eloquent',
        'model' => App\Models\Institution::class,
    ],

    /*'admins' => [
        'driver' => 'eloquent',
        'model' => App\Models\Admin::class,
    ],*/
],
 




];
