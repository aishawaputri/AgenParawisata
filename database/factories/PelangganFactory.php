<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelanggan>
 */
class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_user'=> function () { 
                return User::factory()->create()->getKey();
            },
            'no_hp'=>$this->faker->numerify('08###########'),
            'alamat'=> $this->faker->address,
            'foto_pelanggan'=>$this->faker->image('public/storage/Foto Pelanggan', 200, 200, null, false),
        ];
    }
}
