<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Form;

class CreateFormsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Form::create([
            'id' => Str::orderedUuid(),
            'judul' => "Pendataan Anak Putus Sekolah di Cianjur",
            'deskripsi' => "Aplikasi ini merupakan aplikasi yang berfungsi untuk mendata anak yang mengalami putus sekolah di tingkat SMP atau SMA dan berusia kurang dari 25 tahun"
        ]);
    }
}
