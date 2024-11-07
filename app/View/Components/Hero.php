<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    /**
     * Create a new component instance.
     */
    public $states;
    public $categories;
    public function __construct()
    {
     
        $this->states = [
            ['value' => 'SP', 'name' => 'São Paulo'],
            ['value' => 'PE', 'name' => 'Pernambuco'],
            ['value' => 'MG', 'name' => 'Minas Gerais'],
            ['value' => 'PB', 'name' => 'Paraíba'],
            ['value' => 'RJ', 'name' => 'Rio de Janeiro'],
            ['value' => 'MS', 'name' => 'Mato Grosso do Sul']
        ];
        $this->categories = [
            ['value' => 'car', 'category' => 'SW4'],
            ['value' => 'house', 'category' => 'Glass'],
            ['value' => 'Technology', 'category' => 'Computer'],
            ['value' => 'clothes', 'category' => 'clothes'],
            ['value' => 'babies', 'category' => 'babies']
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero', ['hello' => 'ola']);
    }
}
