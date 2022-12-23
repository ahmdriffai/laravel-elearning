<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login() {
        return view('pages.login');
    }

    public function postLogin(UserLoginRequest $request) {
        try {
            $login = $this->userService->login($request);
            if ($login) {
                return redirect()->route('dashboard');
            }

            return redirect()->back()->with('error', 'Username dan password tidak sesuai')
                ->withInput($request->only(['username']));
        }catch (\Exception $exception) {
            abort(500, 'Server Error');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('form-login');
    }
}
