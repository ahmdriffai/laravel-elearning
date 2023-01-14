<?php


namespace App\Services\Impl;

use App\Exceptions\UserPasswordNotSame;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements UserService
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    function login(UserLoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if (auth()->attempt($credentials, $request->has('remember'))) {
            return true;
        }

        return false;
    }

    function generatePassword($id)
    {
        $password = $this->generataRandomString(8);
        $passwordHash = Hash::make($password);
        $detail = [
            'password' => $passwordHash,
        ];

        $user = $this->userRepository->update($id, $detail);
        $user->password = $password;
        return $user;
    }

    function changePassword($id, ChangePasswordRequest $request)
    {
        $oldPassword = $request->input('old_password');

        $user = User::find($id);

        $password = $user->password;

        if (!Hash::check($oldPassword, $password)) {
            throw new UserPasswordNotSame('password lama salah');
        }

        $newPassword = $request->input('new_password');

        $newPasswordHash = Hash::make($newPassword);

        $detail = [
            'password' => $newPasswordHash,
        ];

        $user = $this->userRepository->update($id, $detail);
        return $user;
    }


    function generataRandomString($size)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $size; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}
