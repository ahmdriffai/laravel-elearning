<?php


namespace App\Services;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserLoginRequest;

interface UserService
{
    function login(UserLoginRequest $request);
    function changePassword($id, ChangePasswordRequest $request);
    function generatePassword($id);
}
