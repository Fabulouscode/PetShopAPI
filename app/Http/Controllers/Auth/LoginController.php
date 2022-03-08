<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\LoginAction;
use App\Actions\Token\Jwt;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function login(LoginRequest $request)
    {
        $user = (new LoginAction($request))->execute();
        abort_if($user->is_admin === 1, 401, 'Admin cannot login through the user side.');

        return JSON(200, 'Login Successful', [
            'token' => (new Jwt())->token($user),
            'login' => auth()->user()
        ]);
    }
}
