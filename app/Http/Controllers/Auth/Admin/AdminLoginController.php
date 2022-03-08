<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Actions\Auth\LoginAction;
use App\Actions\Token\Jwt;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class AdminLoginController extends Controller
{
   
    public function login(LoginRequest $request)
    {
        $user = (new LoginAction($request))->execute();
        abort_if($user->is_admin === 0, 401, 'Unauthorized access.');

        return JSON(200, 'Login Successful', [
            'token' => (new Jwt())->token($user),
            'login' => auth()->user()
        ]);
    }
}
