<?php

namespace Database\Factories;

use App\Models\PaketWisata;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaketWisata>
 */
class PaketWisataFactory extends Factory
{
    
    protected $model = PaketWisata::class;

    public function definition()
    {
        return [
            'nama_paket' => $this->faker->unique()->sentence(4),
            'deskripsi' => $this->faker->paragraph(),
            'fasilitas' => $this->faker->sentence(),
            'itinerary' => $this->faker->paragraph(),
            'diskon' => $this->faker->randomNumber(2),
            'foto1' => 'path_to_photo1.jpg',
            'foto2' => 'path_to_photo2.jpg',
            'foto3' => 'path_to_photo3.jpg',
            'foto4' => 'path_to_photo4.jpg',
            'foto5' => 'path_to_photo5.jpg',
            'status' => $this->faker->randomElement(['0', '1']),
            

        ];
    }

    public function statusDipilih()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => '1',
            ];
        });
    }

}
