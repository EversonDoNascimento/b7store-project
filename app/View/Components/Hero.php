<?php

namespace App\View\Components;

use App\Services\CategoryService;
use App\Services\StateService;
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
     
        $this->states = StateService::getAllStates();
        $this->categories = CategoryService::getAllCategories();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero', ['hello' => 'ola']);
    }
}
