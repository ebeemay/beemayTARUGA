<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class AuthHelper
{
    public static function getUserType()
    {
        if (Auth::guard('student')->check()) {
            return 'student';
        } elseif (Auth::guard('institution')->check()) {
            return 'institution';
        } elseif (Auth::guard('teacher')->check()) {
            return 'teacher';
        }

        return null;
    }
}
