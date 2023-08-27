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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan')->length('20')->unique;
            $table->unsignedBigInteger('id_daftar_paket')->length('20')->unique;
            $table->dateTime('tgl_reservasi_wisata');
            $table->integer('harga')->length('11');
            $table->integer('jumlah_peserta')->length('11');
            $table->decimal('diskon', 10,0);
            $table->float('nilai_diskon');
            $table->bigInteger('total_bayar')->length(20);
            $table->text('file_bukti_tf');
            $table->enum('status-reservasi_wisata',['pesan', 'dibayar', 'selesai']);
            $table->foreign('id_daftar_paket')->references('id')->on('daftar_paket')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
