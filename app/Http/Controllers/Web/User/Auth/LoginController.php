<?php

namespace App\Http\Controllers\Web\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view("web.user.auth.login");
    }

    public function authenticate(Request $request)
    {
        dd($request->all());
    }
}
