<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pertanyaan;

class Opsi extends Model
{
    use HasFactory;
    protected $fillable = [
        'isi',
        'pertanyaans_id',
        'tipe',
        'required'
    ];
    public function Pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'pertanyaans_id');
    }
}
