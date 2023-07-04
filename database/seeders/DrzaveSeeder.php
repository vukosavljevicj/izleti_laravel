<?php

namespace Database\Seeders;

use App\Models\DrzavaIzleta;
use Illuminate\Database\Seeder;

class DrzaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drzave = [
            'Crna Gora',
            'Hrvatska',
            'Srbija',
            'Albanija',
            'Makedonija'
        ];

        foreach ($drzave as $drzava){
            DrzavaIzleta::create([
                'nazivDrzave' => $drzava
            ]);
        }
    }
}
