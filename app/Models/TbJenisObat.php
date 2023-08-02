<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbJenisObat extends Model
{
    use HasFactory;

    protected $table = 'tb_jenis_obat';
    protected $primaryKey = 'id_jenis_obat';
    protected $fillable = [
        'id_jenis_obat',
        'nama_jenis_obat'
    ];
}
