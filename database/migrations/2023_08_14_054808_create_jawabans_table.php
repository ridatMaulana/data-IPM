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
        Schema::create('jawabans', function (Blueprint $table) {
            $table->id();
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('opsis_id')->nullable();
            $table->foreignId('respondens_id')->constrained();
            $table->foreignId('pertanyaans_id')->constrained();
            $table->timestamps();

            $table->foreign('opsis_id')->references('id')->on('opsis')->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawabans');
    }
};
