<?php

namespace App\Http\Controllers;

use App\Models\TbUser;
use App\Services\TbUserService;
use Illuminate\Http\Request;

class TbUserController extends Controller
{
    public function index()
    {
        $users = TbUserService::getAllData();
        return view('user.index', compact('users'));
    }

    public function store(Request $request)
    {
        TbUserService::validateStoreData($request);

        try {
            TbUserService::storeData($request);
            return session()->flash('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return session()->flash('error', 'Data gagal ditambahkan, ' . $th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $response = TbUserService::validateUpdateData($request, $id);

        if ($response === true) {
            TbUserService::updateData($request, $id);
            return session()->flash('success', 'Data berhasil diubah');
        } else {
            return session()->flash('error', $response);
        }
    }

    public function destroy($id)
    {
        TbUser::destroy($id);
        return session()->flash('success', 'Data berhasil dihapus');
    }
}
