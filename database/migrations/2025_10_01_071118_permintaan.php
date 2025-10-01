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
        Schema::create('permintaan', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->unsignedBigInteger('pemohon_id');
            // $table->foreign('pemohon_id')->references('id')->on('users');
            $table->date('tgl_masak');
            $table->string('menu_makan');
            $table->integer('jumlah_porsi');
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan');

    }
};
