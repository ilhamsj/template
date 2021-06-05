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
            $session = $request->session()->regenerate();
            return response()->json([
                "success" => true,
                "message" => "Regenerate success",
                "data"  => $session
            ]);
        } else {
            return response()->json([
                "success" => false,
                "message" => "Regenerate Failed",
                "data"  => $auth
            ]);
        }
    }

    public function logout(Request $request)
    {
        $logout = auth()->logout();

        return response()->json([
            "success" => true,
            "message" => "Logout Success",
            "data"  => $logout
        ]);
    }
}
