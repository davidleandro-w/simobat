<?php

namespace App\Services;

use App\Models\TbUser;
use Illuminate\Support\Facades\Hash;

class TbUserService
{
    public static function getAllData()
    {
        return TbUser::orderBy('username')->get();
    }

    public static function validateStoreData($request)
    {
        $request->validate([
            'username' => 'required|unique:tb_user,username|min:3|max:20',
            'fullname' => 'required|min:3|max:50',
            'password' => 'required|min:3|max:20',
            'is_active' => 'boolean'
        ]);

        return true;
    }

    public static function storeData($request)
    {
        TbUser::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'password' => Hash::make($request->password),
            'is_active' => $request->is_active
        ]);

        return true;
    }

    public static function validateUpdateData($request, $id)
    {
        $request->validate([
            'username' => 'required|unique:tb_user,username,' . $id . ',id_user|min:3|max:20',
            'fullname' => 'required|min:3|max:50',
            'password' => 'nullable|min:3|max:20',
            'is_active' => 'boolean'
        ]);

        if ($request->username == auth()->user()->username and $request->is_active == 0) {
            return 'Tidak dapat menonaktifkan akun Anda sendiri';
        }

        return true;
    }

    public static function updateData($request, $id)
    {
        TbUser::where('id_user', $id)->update([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'is_active' => $request->is_active
        ]);

        // Update password if not null
        if ($request->password) {
            TbUser::where('id_user', $id)->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return true;
    }
}
