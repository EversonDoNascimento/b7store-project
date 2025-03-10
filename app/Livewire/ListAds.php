<?php

namespace App\Livewire;

use App\Services\AdService;
use App\Services\CategoryService;
use App\Services\StateService;
use Livewire\Component;
use Livewire\WithPagination;

class ListAds extends Component
{
    use WithPagination;
    public $search;
    public $categories;
    public $states;

    public $categorySelected;
    public $stateSelected;

    protected $queryString = [
        'search' => ['as' => 's'],
        'categorySelected' => ['as' => 'c'],
        'stateSelected' => ['as' => 'st'],
    ];
    public function render()
    {
     
        $ads = AdService::filteredAds($this->categorySelected, $this->stateSelected, $this->search);
        

        return view('livewire.list-ads', [
            'ads' => $ads
        ]);
    }

    public function updated(){
        $this->resetPage();
    }
    public function mount(){
        
        $this->categories = CategoryService::getAllCategories();
        $this->states = StateService::getAllStates();

    }



}
