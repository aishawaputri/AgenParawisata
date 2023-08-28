<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Karyawan;
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
            'email' => 'operator@perator.com',
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

        User::factory(10)->create();
        Karyawan::factory(10)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
