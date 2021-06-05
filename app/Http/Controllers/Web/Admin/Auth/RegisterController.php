<?php

namespace App\Http\Controllers\Web\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct(Admin $table)
    {
        $this->table = $table;
    }

    public function index()
    {
        return view("web.admin.auth.register");
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
            return view("web.admin.auth.login");
        } else {
            return false;
        }
    }
}
