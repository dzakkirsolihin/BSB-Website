<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\Finder\Gitignore;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            KelasSeeder::class,
            GuruSeeder::class,
            UserSeeder::class,
            MuridTKBestariSeeder::class,
            MuridDaycareSeeder::class,
            PresensiGuruSeeder::class,
        ]);
    }
}
