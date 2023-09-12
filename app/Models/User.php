<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'id';
     protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
        'aktif',
        'remember_token',
    ];

    public function pelanggan(){
        return $this->hasOne(Pelanggan::class,  'id_user');
    }

    public function karyawan(){
        return $this->hasMany(Karyawan::class, 'id', 'id_user');
    }

    public function reservasi(){
        return $this->hasMany(Reservasi::class, 'id', 'id_user');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}