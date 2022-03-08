<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
   
    public function logout()
    {
        Auth::logout();

        return JSON(200, 'User logged out successfully');
    }
}
