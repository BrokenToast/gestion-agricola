<?php

namespace Database\Seeders;

use App\Models\TipoDeGasto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoDeGastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            'Produción',
            'Administrativo',
            'Otro',
        ];
        foreach ($tipos as $value) {
            TipoDeGasto::create(['nombre' => $value]);
        }
    }
}
