<?php

namespace Database\Factories;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    
    protected $model = Karyawan::class;
    
    public function definition()
    {
        return [
            'id_user' => function () { 
                return User::factory()->create()->getKey();
            },
            'alamat' => $this->faker->address,
            'no_hp' => $this->faker->numerify('08###########'),
            'jabatan' => $this->faker->randomElement(['administrasi', 'operator', 'pemilik']),
            
        ];
    }
}
