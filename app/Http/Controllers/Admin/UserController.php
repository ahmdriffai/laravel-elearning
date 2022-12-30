<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\UserPasswordNotSame;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $user = User::all();
        return view('pages.admin.user.index', compact('user'));
    }

    public function postChangePassword(ChangePasswordRequest $request)
    {
        $user = auth()->user();
        try {
            $this->userService->changePassword($user->id, $request);
            return redirect()->back()->with('success', 'Password Berhasil diubah');
        } catch (UserPasswordNotSame $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            dd($e->getMessage());
            abort(500);
        }
    }

    public function generatePassword($id)
    {
        try {
            $user = $this->userService->generatePassword($id);
            return redirect()->back()->with([
                'success' => 'Password Berhasil dibuat',
                'password-show' => true,
                'user' => $user
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
            abort(500);
        }
    }

    public function formChangePassword()
    {
        return view('pages.change-password');
    }
}
