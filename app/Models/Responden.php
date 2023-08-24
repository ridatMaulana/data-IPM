<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_desa',
        'rt',
        'rw',
        'nama',
        'usia',
        'asal_sekolah',
        'nama_orangtua',
        'no_induk_kartukeluarga',
        'status'
    ];
}
