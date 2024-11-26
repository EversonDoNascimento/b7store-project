<?php

namespace Database\Seeders;

use App\Models\State;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    public $states = [
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

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = new DateTime();  // Instanciando o objeto DateTime fora do loop
        
        foreach ($this->states as &$state) {
            // Adicionando os campos de created_at e updated_at para cada estado
            State::create($state);
        }
    }
}
