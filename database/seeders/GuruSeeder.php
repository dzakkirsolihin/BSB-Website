<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            'nip' => '199006202015015',
            'nama_guru' => 'Ade Suparman',
            'jk' => 'L',
            'telp' => '081234567894',
            'alamat' => 'Bandung',
            'kelas_id' => NULL, // Ganti dengan ID kelas yang sesuai
        ]);
        Guru::create([
            'nip' => '198010202008013',
            'nama_guru' => 'Ema Kusmiati',
            'jk' => 'P',
            'telp' => '081234567892',
            'alamat' => 'Bandung',
            'kelas_id' => 2, // Ganti dengan ID kelas yang sesuai
        ]);
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 8; $i++) {
            $phoneNumber = $faker->phoneNumber;
            $formattedPhoneNumber = '08' . Str::substr(Str::of($phoneNumber)->replaceMatches('/[^0-9]/', ''), 2, 13);
            Guru::create([
                'nip' => $faker->unique()->numerify('###############'),
                'nama_guru' => $faker->name,
                'jk' => $faker->randomElement(['L', 'P']),
                'telp' => Str::limit($formattedPhoneNumber, 13), // Limit to 15 characters
                'alamat' => $faker->address,
                'kelas_id' => $faker->numberBetween(1, 4), // Adjust range as needed
            ]);
        }
    }
}
