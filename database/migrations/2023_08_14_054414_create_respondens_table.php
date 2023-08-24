<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('respondens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa', 100);
            $table->integer('rt');
            $table->integer('rw');
            $table->string('nama', 255);
            $table->integer('usia');
            $table->string('asal_sekolah', 100);
            $table->string('nama_orangtua', 255);
            $table->string('no_induk_kartukeluarga', 16)->unique();
            $table->enum('status',['belum lulus smp', 'lulus smp/paket b', 'lulus paket c']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respondens');
    }
};
