<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function login ()
    {
        return view("admin.login");
    }

    public function checkLogin(LoginRequest $request)
    {
        if (!Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            return redirect()->back()->with('failed', 'Account or password is incorrect !!!');
        }

        return redirect()->route('admin.dashboard')->with('success', 'Login success !!!');
    }

    public function dashboard() {
        return view("admin.dashboard");
    }

    public function logout(Request $request) {

        return view("admin.login");
    }
}
