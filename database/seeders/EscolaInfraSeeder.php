<?php

namespace Database\Seeders;

use App\Models\Escola;
use App\Models\EscolaInfraestrutura;
use Database\Factories\EscolaInfraestruturaFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscolaInfraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Escola::factory()->count(5)->create();
    }
}
