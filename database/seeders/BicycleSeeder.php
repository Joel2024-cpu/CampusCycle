<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bicycle;

class BicycleSeeder extends Seeder
{
    public function run(): void
    {
        Bicycle::insert([
            ['name' => 'Sepeda Kampus 01', 'status' => 'available'],
            ['name' => 'Sepeda Kampus 02', 'status' => 'available'],
            ['name' => 'Sepeda Kampus 03', 'status' => 'rented'],
        ]);
    }
}
