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

        $totalTeachers = 10; // Total number of teachers
        $daycareTeachers = $totalTeachers / 2; // Half for daycare

        // Create daycare teachers
        for ($i = 0; $i < $daycareTeachers; $i++) {
            $faker = Faker::create('id_ID');
            Guru::create([
                'nip' => $faker->unique()->numerify('###############'),
                'nama_guru' => $faker->name,
                'jk' => $faker->randomElement(['L', 'P']),
                'telp' => '08' . $faker->unique()->numerify('##########'), // Limit to 13 digits and starts with 08
                'alamat' => $faker->address,
                'kelas_id' => 1, // Assuming 1 is the ID for daycare
            ]);
        }

        // Create remaining teachers for other classes
        for ($i = 0; $i < $totalTeachers - $daycareTeachers; $i++) {
            $faker = Faker::create('id_ID');
            Guru::create([
                'nip' => $faker->unique()->numerify('###############'),
                'nama_guru' => $faker->name,
                'jk' => $faker->randomElement(['L', 'P']),
                'telp' => '08' . $faker->unique()->numerify('##########'), // Limit to 13 digits and starts with 08
                'alamat' => $faker->address,
                'kelas_id' => $faker->numberBetween(2, 4), // Adjust range for other classes
            ]);
        }
    }
}
