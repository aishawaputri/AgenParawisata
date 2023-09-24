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
            $table->unsignedBigInteger('id_pelanggan');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_daftar_paket');
            $table->foreign('id_daftar_paket')->references('id')->on('daftar_paket')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('tgl_reservasi_wisata');
            $table->integer('jumlah_peserta');
            $table->decimal('harga_paket', 10, 3);
            $table->decimal('diskon');
            $table->decimal('nilai_diskon', 10, 3);
            $table->decimal('total_bayar', 10, 3);
            $table->text('file_bukti_tf')->nullable();
            $table->enum('status_reservasi_wisata',['pesan', 'bayar', 'selesai'])->default('pesan');
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
