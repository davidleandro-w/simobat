<?php

namespace App\Services;

use App\Models\TbObat;

class TbObatService
{
    public static function getAllData()
    {
        return TbObat::whereHas('jenis_obat')->orderBy('nama_obat')->get();
    }

    public static function validateStoreData($request)
    {
        $request->validate([
            'id_jenis_obat' => 'required|exists:tb_jenis_obat,id_jenis_obat',
            'nama_obat' => 'required|min:3|max:50',
            'satuan' => 'required|min:3|max:20',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'tanggal_expired' => 'required|date'
        ]);

        return true;
    }

    public static function storeData($request)
    {
        TbObat::create([
            'nama_obat' => $request->nama_obat,
            'id_jenis_obat' => $request->id_jenis_obat,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'tanggal_expired' => $request->tanggal_expired,
        ]);

        return true;
    }

    public static function validateUpdateData($request, $id)
    {
        $request->validate([
            'id_jenis_obat' => 'required|exists:tb_jenis_obat,id_jenis_obat',
            'nama_obat' => 'required|min:3|max:50',
            'satuan' => 'required|min:3|max:20',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'tanggal_expired' => 'required|date'
        ]);

        return true;
    }

    public static function updateData($request, $id)
    {
        TbObat::where('id_obat', $id)->update([
            'id_jenis_obat' => $request->id_jenis_obat,
            'nama_obat' => $request->nama_obat,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'tanggal_expired' => $request->tanggal_expired,
        ]);

        return true;
    }
}
