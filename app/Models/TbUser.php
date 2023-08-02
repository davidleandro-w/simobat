<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TbUser extends Authenticatable
{
    use HasFactory;

    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'id_user',
        'username',
        'password',
        'fullname',
        'is_active'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
