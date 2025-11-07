<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Bicycle;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin CampusCycle',
            'email' => 'admin@campuscycle.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        // Beberapa sepeda
        $sepeda = [
            ['kode_sepeda' => 'CC001', 'merk' => 'Polygon Xtrada', 'status' => 'available'],
            ['kode_sepeda' => 'CC002', 'merk' => 'United Detroit', 'status' => 'available'],
            ['kode_sepeda' => 'CC003', 'merk' => 'Pacific Noris', 'status' => 'rented'],
        ];

        foreach ($sepeda as $item) {
            Bicycle::create($item);
        }
        $this->call(BicycleSeeder::class);
    }
}
