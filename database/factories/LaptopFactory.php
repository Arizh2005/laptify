<?php

// database/factories/LaptopFactory.php

// database/factories/LaptopFactory.php

// database/factories/LaptopFactory.php

namespace Database\Factories;

use App\Models\Laptop;
use Illuminate\Database\Eloquent\Factories\Factory;

class LaptopFactory extends Factory
{
    protected $model = Laptop::class;

    public function definition()
    {
        return [
            'merk' => fake()->word(),        // Menghasilkan satu kata
            'model' => fake()->word(),       // Menghasilkan satu kata
            'prosesor' => fake()->word(),    // Menghasilkan satu kata
            'ram' => fake()->numberBetween(4, 64),  // Menghasilkan angka antara 4 dan 64
            'storage' => fake()->numberBetween(128, 2000), // Menghasilkan angka antara 128 dan 2000
        ];
    }
}
