<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    use HasFactory;
    protected  $primaryKey = 'id';
    protected $table = 'paket_wisata';
    protected $fillable =[
        'nama_paket',
        'deskripsi',
        'fasilitas',
        'itinerary',
        'diskon',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5',
        'status'
    ];

    public function reservasi(){
        return $this->hasMany(Reservasi::class, 'id', 'id_paket_wisata');
    }
    
}
