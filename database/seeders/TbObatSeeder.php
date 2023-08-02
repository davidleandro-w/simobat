<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TbObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayObat = [
            [
                'id_obat' => 1,
                'id_jenis_obat' => 1,
                'nama_obat' => 'Obat Satu',
                'satuan' => 'pcs',
                'harga' => 1000,
                'stok' => 10,
                'tanggal_expired' => '2024-08-01'
            ],
            [
                'id_obat' => 2,
                'id_jenis_obat' => 2,
                'nama_obat' => 'Obat Dua',
                'satuan' => 'botol',
                'harga' => 2000,
                'stok' => 20,
                'tanggal_expired' => '2024-08-02'
            ],
            [
                'id_obat' => 3,
                'id_jenis_obat' => 3,
                'nama_obat' => 'Obat Tiga',
                'satuan' => 'unit',
                'harga' => 3000,
                'stok' => 30,
                'tanggal_expired' => '2024-08-03'
            ],
            [
                'id_obat' => 4,
                'id_jenis_obat' => 2,
                'nama_obat' => 'Obat Empat',
                'satuan' => 'botol',
                'harga' => 4000,
                'stok' => 40,
                'tanggal_expired' => '2024-08-04'
            ],
            [
                'id_obat' => 5,
                'id_jenis_obat' => 3,
                'nama_obat' => 'Obat Lima',
                'satuan' => 'unit',
                'harga' => 5000,
                'stok' => 50,
                'tanggal_expired' => '2024-08-05'
            ],

        ];

        foreach ($arrayObat as $obat) {
            \App\Models\TbObat::firstOrCreate($obat);
        }
    }
}
