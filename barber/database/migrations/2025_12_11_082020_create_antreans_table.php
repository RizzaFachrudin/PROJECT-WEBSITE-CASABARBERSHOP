<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('antreans', function (Blueprint $table) {
            $table->id('id_antrean');
            $table->string('nama_pelanggan');
            $table->integer('ServiceId');
            $table->integer('total_biaya');
            $table->string('metode_pembayaran');
            $table->string('status_pembayaran');
            $table->string('status_antrean');
            $table->integer('nomor_antrean');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antreans');
    }
};
