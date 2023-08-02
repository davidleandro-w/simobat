<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbObat extends Model
{
    use HasFactory;

    protected $table = 'tb_obat';
    protected $primaryKey = 'id_obat';
    protected $fillable = [
        'id_obat',
        'id_jenis_obat',
        'nama_obat',
        'satuan',
        'harga',
        'stok',
        'tanggal_expired',
    ];

    protected $casts = [
        'tanggal_expired' => 'date',
    ];

    public function jenis_obat()
    {
        return $this->belongsTo(TbJenisObat::class, 'id_jenis_obat', 'id_jenis_obat');
    }
}
