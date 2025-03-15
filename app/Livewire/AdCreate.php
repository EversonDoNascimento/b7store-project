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
    #[Validate('required|min:0')]
    public $value;
    #[Validate('required|in:0,1')]
    public $negotiable;
    #[Validate('required|exists:categories,id')]
    public $category;
    #[Validate('required')]
    public $description;

    #[Validate([
        'images' => 'required|array|min:1|max:5',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120'
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
        foreach($this->images as $image){
            $image->store('images', 'public');
        }
        return dd($this->title, str_replace(',', '.', str_replace('.', '', $this->value)), $this->negotiable, $this->category, $this->description, $this->images, $this->selectedImage);
        return \redirect(route("ad.create"));
    }

    public function setSelectedImage($index){
        if($this->images[$index]){
            $this->selectedImage = $this->images[$index];
        }
    }

    public function updated($propertyName){
        if($propertyName == "images"){
            $this->selectedImage = $this->images[0];
        }
        // if($propertyName == "value" && $this->value){
        //     $this->value = \number_format(strval((int) $this->value) > 0 ? $this->value : 0, 2, ',', '.');
        // }
       
    }

    public function updatedValue()
    {
        $this->value = $this->value !== '' && \strval((int) $this->value) > 0 ? number_format((float) str_replace(',', '.', str_replace('.', '', $this->value)), 2, ',', '.') : '';
    }

}
