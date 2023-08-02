<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TbJenisObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayJenisObat = [
            [
                'id_jenis_obat' => 1,
                'nama_jenis_obat' => 'Dummex'
            ],
            [
                'id_jenis_obat' => 2,
                'nama_jenis_obat' => 'Medidum'
            ],
            [
                'id_jenis_obat' => 3,
                'nama_jenis_obat' => 'Curexyl'
            ]
        ];

        foreach ($arrayJenisObat as $jenisObat) {
            \App\Models\TbJenisObat::firstOrCreate($jenisObat);
        }
    }
}
