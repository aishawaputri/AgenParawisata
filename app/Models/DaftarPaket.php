<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPaket extends Model
{
    use HasFactory;
    protected $table = 'daftar_paket';
    protected $fillable = [
    'id_paket_wisata',
    'jumlah_peserta',
    'harga_paket'
    ];

    public function fpaket_wisata(){
        return $this->belongsTo(PaketWisata::class, 'id_paket_wisata', 'id');
    }
    
    public function reservasi(){
        return $this->hasMany(Reservasi::class, 'id', 'id_daftar_paket');
    }
   

}

