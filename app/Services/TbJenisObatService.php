<?php

namespace App\Services;

use App\Models\TbJenisObat;

class TbJenisObatService
{
    public static function getAllData()
    {
        return TbJenisObat::orderBy('nama_jenis_obat')->get();
    }

    public static function validateStoreData($request)
    {
        $request->validate([
            'nama_jenis_obat' => 'required|unique:tb_jenis_obat,nama_jenis_obat|min:3|max:20',
        ]);

        return true;
    }

    public static function storeData($request)
    {
        TbJenisObat::create([
            'nama_jenis_obat' => $request->nama_jenis_obat,
        ]);

        return true;
    }

    public static function validateUpdateData($request, $id)
    {
        $request->validate([
            'nama_jenis_obat' => 'required|unique:tb_jenis_obat,nama_jenis_obat,' . $id . ',id_jenis_obat|min:3|max:20',
        ]);

        return true;
    }

    public static function updateData($request, $id)
    {
        TbJenisObat::where('id_jenis_obat', $id)->update([
            'nama_jenis_obat' => $request->nama_jenis_obat,
        ]);

        return true;
    }

    public static function getAllDataForOptions()
    {
        return TbJenisObat::all();
    }
}
