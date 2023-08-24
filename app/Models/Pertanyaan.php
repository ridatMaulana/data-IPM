<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'pertanyaan',
        'kategoris_id',
        'tipe',
        'required'
    ];
    public function Kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategoris_id');
    }
}
