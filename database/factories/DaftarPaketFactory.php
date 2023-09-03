<?php

namespace Database\Factories;
use App\Models\DaftarPaket;
use App\Models\PaketWisata;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use NumberFormatter;
use PhpParser\Builder\Function_;


class DaftarPaketFactory extends Factory
{
    
    protected $model = DaftarPaket::class;
    
    public function definition(): array
    
    {
        $maxPaketWisataId = PaketWisata::where('status', '1')->max('id');
        $idPaketWisata = $this->faker->numberBetween(1, $maxPaketWisataId);
        
        return [
            'id_paket_wisata' => $idPaketWisata,
            'jumlah_peserta' => $this->faker->numberBetween(1, 100,),
            'harga_paket' => $this->faker->numberBetween(100, 1000),
            ];
    }
}

