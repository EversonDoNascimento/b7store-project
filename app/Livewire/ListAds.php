<?php

namespace App\Livewire;

use App\Services\AdService;
use App\Services\CategoryService;
use App\Services\StateService;
use Livewire\Component;

class ListAds extends Component
{
    public $filteredAds;
    public $search;
    public $categories;
    public $states;

    public $categorySelected;
    public $stateSelected;
    public function render()
    {
      
        $this->filteredAds = AdService::filteredAds($this->categorySelected, $this->stateSelected, $this->search);
        return view('livewire.list-ads');
    }

    public function mount(){
        
        $this->categories = CategoryService::getAllCategories();
        $this->states = StateService::getAllStates();

    }



}
