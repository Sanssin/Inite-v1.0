<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function profile()
    {
        $username = User::with('username')->findOrFail(auth()->id());
        $email = User::with('email')->findOrFail(auth()->id());
        return view('landing_page.index', [
            'username' => $username,
            'email' => $email,
        ]);
    }
}
