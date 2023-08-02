<?php

namespace App\Http\Controllers;

use App\Models\TbJenisObat;
use App\Models\TbObat;
use App\Models\TbUser;
use App\Services\TbObatService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_jenis_obat = TbJenisObat::count();
        $jumlah_obat = TbObat::whereHas('jenis_obat')->count();
        $jumlah_obat_expired = TbObat::whereHas('jenis_obat')->where('tanggal_expired', '<=', date('Y-m-d'))->count();
        $jumlah_obat_belum_expired = TbObat::whereHas('jenis_obat')->where('tanggal_expired', '>', date('Y-m-d'))->count();
        $jumlah_user = TbUser::count();
        $jumlah_user_aktif = TbUser::where('is_active', 1)->count();
        $jumlah_user_tidak_aktif = TbUser::where('is_active', 0)->count();
        $obats = TbObatService::getAllData();

        return view(
            'dashboard.index',
            compact(
                'jumlah_jenis_obat',
                'jumlah_obat',
                'jumlah_obat_expired',
                'jumlah_obat_belum_expired',
                'jumlah_user',
                'jumlah_user_aktif',
                'jumlah_user_tidak_aktif',
                'obats'
            )
        );
    }
}
