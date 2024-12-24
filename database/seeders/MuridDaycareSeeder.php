<?php

namespace Database\Seeders;

use App\Models\MuridDaycare;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class MuridDaycareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            $phoneNumber = $faker->phoneNumber;
            $formattedPhoneNumber = Str::of($phoneNumber)->replaceMatches('/[^0-9]/', ''); // Remove non-numeric characters
            MuridDaycare::create([ // Use the Murid model for insertion
                'no_induk' => $faker->unique()->numerify('M####'),
                'nama_siswa' => $faker->name,
                'jk' => $faker->randomElement(['L', 'P']),
                'no_telp_orang_tua' => Str::limit($formattedPhoneNumber, 15), // Limit to 15 characters
                'alamat' => $faker->address,
                'kelas_id' => 1, // Adjust range as needed
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
