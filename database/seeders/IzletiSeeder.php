<?php

namespace Database\Seeders;

use App\Models\Izlet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IzletiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {

            Izlet::create([
                'drzavaId' => rand(1,5),
                'tipId' => rand(1,3),
                'nazivIzleta' => $faker->sentence(2),
                'cena' => rand(20,155),
                'opis' => $faker->sentences(3, true)
            ]);
        }
    }
}
