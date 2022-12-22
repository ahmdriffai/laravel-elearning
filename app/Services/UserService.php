<?php


namespace App\Services;


use App\Http\Requests\UserLoginRequest;

interface UserService
{
    function login(UserLoginRequest $request);
}
