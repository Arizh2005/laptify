<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Laptop;

class LaptopSeeder extends Seeder
{
    public function run()
    {
        Laptop::create([
            'merk' => 'Dell',
            'model' => 'XPS 13',
            'prosesor' => 'Intel i7',
            'ram' => 16,
            'storage' => 512,
        ]);

        Laptop::create([
            'merk' => 'Apple',
            'model' => 'MacBook Pro',
            'prosesor' => 'M1',
            'ram' => 16,
            'storage' => 1024,
        ]);
    }
}
