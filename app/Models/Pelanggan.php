<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $fillable = [ 
        'id_user',
        'no_hp',
        'alamat',
        'foto_pelanggan',
    ];
    public function fuser(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function reservasi(){
        return $this->hasMany(Reservasi::class, 'id', 'id_pelanggan');
    }
}
