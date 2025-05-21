<?php

namespace Database\Factories;

use App\Models\Escola;
use App\Models\EscolaInfraestrutura;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EscolaInfraestrutura>
 */
class EscolaInfraestruturaFactory extends Factory
{
    protected $model = EscolaInfraestrutura::class;

    public function definition(): array
    {
        return [
            'codigo_escola_inep' => $this->faker->unique()->numerify('#########'),
            'predio_escolar' => $this->faker->boolean,
            'salas_em_outra_escola' => $this->faker->boolean,
            'galpao_rancho_paiol_barracao' => $this->faker->boolean,
            'unidade_atendimento_socioeducativa' => $this->faker->boolean,
            'unidade_prisional' => $this->faker->boolean,
            'outros_locais_funcionamento' => $this->faker->boolean,
            'escola_id' => Escola::factory(), // Cria uma escola relacionada
        ];
    }
}
