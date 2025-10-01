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
        Schema::create('permintaan_detail', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->unsignedBigInteger('permintaan_id');
            // $table->foreign('permintaan_id')->references('id')->on('permintaan');
            $table->unsignedBigInteger('bahan_id');
            // $table->foreign('bahan_id')->references('id')->on('bahan_baku')->onDelete('cascade');
            $table->integer('jumlah_diminta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_detail');

    }
};
