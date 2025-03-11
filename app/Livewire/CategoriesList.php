<?php

namespace App\Livewire;

use App\Services\CategoryService;
use Livewire\Component;

class CategoriesList extends Component
{
    public $categories = [];
    public function render()
    {
        $this->categories = CategoryService::getAllCategories();
        return view('livewire.categories-list');
    }

}
