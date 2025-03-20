<?php

namespace App\Livewire;

use App\Services\AdService;
use App\Services\CategoryService;
use Livewire\Component;
use Livewire\Attributes\Validate;

class AdEdit extends Component
{
    public $id;
    public $ad;
    public $loadedCategories;
    #[Validate('required')]
    public $title;
    #[Validate('required|min:0')]
    public $value;
    #[Validate('required|in:0,1')]
    public $negotiable;
    #[Validate('required|exists:categories,id')]
    public $category;
    #[Validate('required')]
    public $description;

    public function render()
    {   
        return view('livewire.ad-edit');
    }

    public function mount(){
        $this->loadedCategories = CategoryService::getAllCategories();
        $this->ad = AdService::getSingleAdById($this->id);
        $this->fillOldDate();
    }
      public function save(){
        $this->validate();
        // AdService::createAd($this);
        //return \redirect(route("ad.create"));
    }


    public function fillOldDate(){
       $this->title = $this->ad->title;
       $this->value = $this->ad->price;
       $this->negotiable = $this->ad->negotiable;
       $this->category = $this->ad->category->id;
       $this->description = $this->ad->description;
    }
    public function updatedValue()
    {
        $this->value = $this->convertValueToCoin($this->value); 
    }

    public function convertValueToCoin($value){
        if(!$value) return "";
        return $value !== '' && \strval((int) $value) > 0 ? number_format((float) str_replace(',', '.', str_replace('.', '', $value)), 2, ',', '.') : '';
    }
}
