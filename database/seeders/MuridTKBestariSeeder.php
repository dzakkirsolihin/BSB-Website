<?php

namespace Database\Seeders;

use App\Models\MuridTKBestari;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class MuridTKBestariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 20; $i++) {
            $phoneNumber = $faker->phoneNumber;
            $formattedPhoneNumber = Str::of($phoneNumber)->replaceMatches('/[^0-9]/', ''); // Remove non-numeric characters
            MuridTKBestari::create([ // Use the Murid model for insertion
                'no_induk' => $faker->unique()->numerify('M####'),
                'nis' => $faker->unique()->numerify('#########'),
                'nama_siswa' => $faker->name,
                'jk' => $faker->randomElement(['L', 'P']),
                'no_telp_orang_tua' => Str::limit($formattedPhoneNumber, 15), // Limit to 15 characters
                'alamat' => $faker->address,
                'kelas_id' => $faker->numberBetween(2, 4), // Adjust range as needed
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
