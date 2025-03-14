<?php

namespace App\Livewire;

use App\Services\CategoryService;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class AdCreate extends Component
{

    use WithFileUploads;

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

    #[Validate([
        'images' => 'required|array|min:1|max:5',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ])]
    public $images;

    public $selectedImage;

    public function render()
    {
        $this->loadedCategories = CategoryService::getAllCategories();
        return view('livewire.ad-create');
    }

    public function save(){
        $this->validate();
        return dd($this->images);
        return dd($this->title, $this->value, $this->negotiable, $this->category, $this->description);
        return \redirect(route("ad.create"));
    }

    public function setSelectedImage($index){
        // return \dd($this->images[$index]);
        if($this->images[$index]){
            $this->selectedImage = $this->images[$index];
        }
    }

    public function updated($propertyName){
        if($propertyName == "images"){
            $this->selectedImage = null;
        }
    }
}
