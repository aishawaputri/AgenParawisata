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
        Schema::create('daftar_paket', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket', 255)->unique();
            $table->unsignedBigInteger('id_paket_wisata')->lenght(20)->unique;
            $table->integer('jumlah_peserta')->lenght(11);
            $table->bigInteger('harga_paket')->lenght(20);
            $table->foreign('id_paket_wisata')->references('id')->on('paket_wisata')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_paket');
    }
};