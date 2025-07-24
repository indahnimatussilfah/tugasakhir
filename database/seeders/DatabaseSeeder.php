<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'nik' => null, // <- biarkan null
            'no_telpon' => '081234567890',
            'alamat' => 'Alamat Admin',
        ]);

        // User::create([
        //     'name' => 'Masyarakat User',
        //     'email' => 'masyarakat@gmail.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'masyarakat',
        // ]);

        // User::create([
        //     'name' => 'Petugas Kesehatan',
        //     'email' => 'kesehatan@gmail.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'petugas_kesehatan',
        // ]);

        // User::create([
        //     'name' => 'Petugas Analis',
        //     'email' => 'analis@gmail.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'petugas_analis',
        // ]);
    }
}
