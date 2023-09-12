<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\DaftarPaket;
use App\Models\Karyawan;
use App\Models\PaketWisata;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'level' => 'admin',
            'aktif' => '1',
            'remember_token' => ''
        ]);

        User::create([
            'name' => 'Operator',
            'email' => 'operator@operator.com',
            'password' => bcrypt('12345678'),
            'level' => 'operator',
            'aktif' => '1',
            'remember_token' => ''
        ]);

        User::create([
            'name' => 'Pelanggan',
            'email' => 'pelanggan@pelanggan.com',
            'password' => bcrypt('12345678'),
            'level' => 'pelanggan',
            'aktif' => '1',
            'remember_token' => ''
        ]);

        User::create([
            'name' => 'Pemilik',
            'email' => 'pemilik@pemilik.com',
            'password' => bcrypt('12345678'),
            'level' => 'pemilik',
            'aktif' => '1',
            'remember_token' => ''
        ]);

        Pelanggan::create([
            'id_user' => '3',
            'no_hp' => '085714439204',
            'alamat' => 'Cibinong no.17 jalan perhubungan asri bogor ',
            'foto_pelanggan' => asset('storage/Foto/pp_kosong.jpg'),
        ]);

        User::factory(50)->create();
        Karyawan::factory(10)->create();
        PaketWisata::factory(15)->create();
        DaftarPaket::factory(10)->create();
        Pelanggan::factory(15)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
