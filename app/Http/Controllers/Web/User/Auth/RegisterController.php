<?php

namespace App\Http\Controllers\Web\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view("web.user.auth.register");
    }

    public function register(Request $request)
    {
        dd($request->all());
    }
}
