<?php

namespace App\Http\Controllers;

use App\Models\TbJenisObat;
use App\Services\TbJenisObatService;
use Illuminate\Http\Request;

class TbJenisObatController extends Controller
{
    public function index()
    {
        $jenis_obats = TbJenisObatService::getAllData();
        return view('jenis-obat.index', compact('jenis_obats'));
    }

    public function store(Request $request)
    {
        TbJenisObatService::validateStoreData($request);

        try {
            TbJenisObatService::storeData($request);
            return session()->flash('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return session()->flash('error', 'Data gagal ditambahkan, ' . $th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $response = TbJenisObatService::validateUpdateData($request, $id);

        if ($response === true) {
            TbJenisObatService::updateData($request, $id);
            return session()->flash('success', 'Data berhasil diubah');
        } else {
            return session()->flash('error', $response);
        }
    }

    public function destroy($id)
    {
        TbJenisObat::destroy($id);
        return session()->flash('success', 'Data berhasil dihapus');
    }
}
