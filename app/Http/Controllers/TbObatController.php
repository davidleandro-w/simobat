<?php

namespace App\Http\Controllers;

use App\Models\TbObat;
use App\Services\TbJenisObatService;
use App\Services\TbObatService;
use Illuminate\Http\Request;

class TbObatController extends Controller
{
    public function index()
    {
        $obats = TbObatService::getAllData();
        $jenisObats = TbJenisObatService::getAllDataForOptions();
        return view('obat.index', compact('obats', 'jenisObats'));
    }

    public function store(Request $request)
    {
        TbObatService::validateStoreData($request);

        try {
            TbObatService::storeData($request);
            return session()->flash('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return session()->flash('error', 'Data gagal ditambahkan, ' . $th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $response = TbObatService::validateUpdateData($request, $id);

        if ($response === true) {
            TbObatService::updateData($request, $id);
            return session()->flash('success', 'Data berhasil diubah');
        } else {
            return session()->flash('error', $response);
        }
    }

    public function destroy($id)
    {
        TbObat::destroy($id);
        return session()->flash('success', 'Data berhasil dihapus');
    }
}
