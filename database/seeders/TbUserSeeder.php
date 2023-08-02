<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TbUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\TbUser::firstOrCreate([
            'username' => 'superadmin',
        ], [
            'id_user' => 1,
            'fullname' => 'Super Admin',
            'password' => Hash::make('superadmin'),
            'is_active' => 1
        ]);

        \App\Models\TbUser::firstOrCreate([
            'username' => 'operator',
        ], [
            'id_user' => 2,
            'fullname' => 'Operator',
            'password' => Hash::make('operator'),
            'is_active' => 1
        ]);
    }
}
