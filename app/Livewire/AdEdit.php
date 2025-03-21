<?php

namespace App\Livewire;

use App\Services\AdService;
use App\Services\CategoryService;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class AdEdit extends Component
{

    use WithFileUploads;


    public $id;
    public $ad;
    public $loadedCategories;
    public $loadedImages;
    public $title;
    public $value;
    public $negotiable;
    public $category;
    public $description;
    public $images;

    public $selectedImage;

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
       $this->loadedImages = $this->ad->images;
    }
    public function updatedValue()
    {
        $this->value = $this->convertValueToCoin($this->value); 
    }

    public function convertValueToCoin($value){
        if(!$value) return "";
        return $value !== '' && \strval((int) $value) > 0 ? number_format((float) str_replace(',', '.', str_replace('.', '', $value)), 2, ',', '.') : '';
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
    }

    public function rules(){
          return [
            'title' => 'required',
            'value' => 'required|min:0',
            'negotiable' => 'required|in:0,1',
            'category' => 'required|exists:categories,id',
            'description' => 'required',
            'images' => ['nullable', 'array', 'max:'. (5 - count($this->ad->images))],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120'],
        ];
    }
}
