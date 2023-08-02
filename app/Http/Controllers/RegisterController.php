<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => ['required|min:3|max:50'],
            'username' => ['required', 'unique:tb_user,username'],
            'password' => ['required', 'confirmed', 'min:3', 'max:20']
        ]);

        $user = \App\Models\TbUser::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, hubungi admin untuk mengaktifkan akun Anda!');
    }
}
