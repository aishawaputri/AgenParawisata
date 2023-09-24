<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';
    protected $fillable = [ 
        'id_pelanggan',
        'id_daftar_paket',
        'tgl_reservasi_wisata',
        'jumlah_peserta',
        'harga_paket',
        'diskon',
        'nilai_diskon',
        'total_bayar',
        'file_bukti_tf',
        // 'status_rservasi_wisata'
    ];
    public function dpaket(){
        return $this->belongsTo(DaftarPaket::class, 'id_daftar_paket', 'id');
}
    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class,  'id_pelanggan');
    }
    
}