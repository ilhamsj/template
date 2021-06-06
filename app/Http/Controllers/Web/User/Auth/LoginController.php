<?php

namespace App\Http\Controllers\Web\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view("web.user.auth.login");
    }

    public function authenticate(Request $request)
    {
        Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|exists:users",
            "password" => "required",
        ]);

        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        $auth = auth()->attempt($credentials);

        if ($auth) {
            return redirect()->route("user.dashboard");
        } else {
            return redirect()->route("user.auth.login.index");
        }
    }

    public function logout(Request $request)
    {
        $logout = auth()->logout();
        return redirect()->route("user.auth.login.index");
    }
}
