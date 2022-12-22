<?php


namespace App\Services\Impl;


use App\Http\Requests\UserLoginRequest;
use App\Services\UserService;

class UserServiceImpl implements UserService
{

    function login(UserLoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if (auth()->attempt($credentials, $request->has('remember')))
        {
            return true;
        }

        return false;
    }
}
