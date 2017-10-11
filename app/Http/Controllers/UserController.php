<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register()
    {
        return view('school.user.register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()
            ->route('home');
    }
}
