<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\ResetPasswordAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetRequest;

class ResetPasswordController extends Controller
{
    
    public function resetPassword(PasswordResetRequest $request)
    {
        $user = (new ResetPasswordAction($request))->execute();

        return JSON(200, 'Your password has been changed successfully.', ['email' => $user->email]);
    }
}
