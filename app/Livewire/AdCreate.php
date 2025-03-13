<?php

namespace App\Livewire;

use App\Services\CategoryService;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AdCreate extends Component
{
    public $loadedCategories;
    #[Validate('required')]
    public $title;
    #[Validate('required')]
    public $value;
    #[Validate('required')]
    public $negotiable;
    #[Validate('required')]
    public $category;
    #[Validate('required')]
    public $description;
    public function render()
    {
        $this->loadedCategories = CategoryService::getAllCategories();
        return view('livewire.ad-create');
    }

    public function save(){
        $this->validate();
        return dd($this->title, $this->value, $this->negotiable, $this->category, $this->description);
        return \redirect(route("ad.create"));
    }
}
