<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function p()
    {
        return view('auth/p');
    }
    public function regist()
    {
        return view('auth/regist');
    }

    public function post_p(Request $request)
    {
    }

    public function post_regist(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::create($request->except(['token']));

        event(new Registered($user));

        Auth::Login($user);

        return redirect()->route('verification.notice')->with('success', 'Akun Berhasil Dibuat, Silahkan Verifikasi Email Anda');
    }
}
