<?php

namespace App\Http\Controllers\Web\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view("web.admin.auth.login");
    }

    public function authenticate(Request $request)
    {
        Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|exists:admins",
            "password" => "required",
        ]);

        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        $auth = auth()->guard("web_admin")->attempt($credentials);

        if ($auth) {
            return redirect()->route("backyard.dashboard");
        } else {
            return redirect()->route("backyard.auth.login.index");
        }
    }

    public function logout(Request $request)
    {
        $logout = auth()->logout();
        return redirect()->route("backyard.auth.login.index");
    }
}
