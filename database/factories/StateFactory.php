<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\State>
 */
class StateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            ['name' => 'Acre'],
            ['name' => 'Alagoas'],
            ['name' => 'Amapá'],
            ['name' => 'Amazonas'],
            ['name' => 'Bahia'],
            ['name' => 'Ceará'],
            ['name' => 'Distrito Federal'],
            ['name' => 'Espírito Santo'],
            ['name' => 'Goiás'],
            ['name' => 'Maranhão'],
            ['name' => 'Mato Grosso'],
            ['name' => 'Mato Grosso do Sul'],
            ['name' => 'Minas Gerais'],
            ['name' => 'Pará'],
            ['name' => 'Paraíba'],
            ['name' => 'Paraná'],
            ['name' => 'Pernambuco'],
            ['name' => 'Piauí'],
            ['name' => 'Rio de Janeiro'],
            ['name' => 'Rio Grande do Norte'],
            ['name' => 'Rio Grande do Sul'],
            ['name' => 'Rondônia'],
            ['name' => 'Roraima'],
            ['name' => 'Santa Catarina'],
            ['name' => 'São Paulo'],
            ['name' => 'Sergipe'],
            ['name' => 'Tocantins'],
        ];
    }
}
