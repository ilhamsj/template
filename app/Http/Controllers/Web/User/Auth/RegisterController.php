<?php

namespace App\Http\Controllers\Web\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct(User $user)
    {
        $this->table = $user;
    }

    public function index()
    {
        return view("web.user.auth.register");
    }

    public function register(Request $request)
    {
        Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|unique:users",
            "password" => "required",
        ]);

        $result = $this->table->create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);

        if ($result) {
            return view("web.user.auth.login");
        } else {
            return "Failed";
        }
    }
}
