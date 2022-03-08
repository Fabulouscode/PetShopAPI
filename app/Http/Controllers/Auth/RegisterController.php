<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Actions\Auth\CreateNewUser;
use App\Actions\Token\Jwt;
use App\Http\Resources\UserResource;
use JWTAuth;

class RegisterController extends Controller
{
    
    public function register(RegisterRequest $request)
    {
        $user = (new CreateNewUser())->execute($request);

        return JsonResponse(201, 'User account created successfully', [
            "user" => new UserResource($user),
            'token' => (new Jwt())->token($user),
            'login' => auth()->user()
        ]);
    }
}
