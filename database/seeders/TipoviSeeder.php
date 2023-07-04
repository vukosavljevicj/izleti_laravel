<?php

namespace Database\Seeders;

use App\Models\TipIzleta;
use Illuminate\Database\Seeder;

class TipoviSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipovi = [
            'Priroda',
            'Avantura',
            'Plovidba'
        ];

        foreach ($tipovi as $tip){
            TipIzleta::create([
                'tip' => $tip
            ]);
        }
    }
}
