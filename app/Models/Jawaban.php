<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Opsi;
use App\Models\Responden;
use App\Models\Pertanyaan;

class Jawaban extends Model
{
    use HasFactory;
    protected $fillable = [
        'keterangan',
        'opsis_id',
        'respondens_id',
        'pertanyaans_id'
    ];

    public function Opsi()
    {
        return $this->belongsTo(Opsi::class, 'opsis_id');
    }

    public function Responden()
    {
        return $this->belongsTo(Responden::class, 'respondens_id');
    }

    public function Pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'pertanyaans_id');
    }

}
