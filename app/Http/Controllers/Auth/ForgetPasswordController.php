<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\ForgetPasswordAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordRequest;


class ForgetPasswordController extends Controller
{
  
  public function forgetPassword(ForgetPasswordRequest $request)
  {
    $user = (new ForgetPasswordAction($request))->execute();

    return JSON(200, "Password reset token has been sent to {$user->email}.");
  }
}
