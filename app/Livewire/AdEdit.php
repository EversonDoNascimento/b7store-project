<?php

namespace App\Livewire;

use App\Services\AdService;
use App\Services\CategoryService;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Validation\ValidationException;

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
    public $isLocalImageSelected;
    public $selectedImage;

    public function render()
    {      
        // return dd($this->selectedImage);
        return view('livewire.ad-edit');
    }

    public function mount(){
     
        $this->loadedCategories = CategoryService::getAllCategories();
        $this->ad = AdService::getSingleAdById($this->id);
        $this->fillOldDate();
    }
      public function save(){
        $this->validate();
        if(!$this->images || count($this->images) <= 0){
            if(!$this->loadedImages  || count($this->loadedImages) <= 0 ){
                throw ValidationException::withMessages([
                    'imagesLoaded' => 'Precisa selecionar alguma imagem',
                ]);
            }
        }
        // Save new images and defined new main image
        AdService::saveImagesInStorage($this);
        // Save changes in ad
        AdService::editAd($this);
        AdService::changeMainImage($this, $this->selectedImage);
 
    }


    public function fillOldDate(){
       $this->title = $this->ad->title;
       $this->value = $this->ad->price;
       $this->negotiable = $this->ad->negotiable;
       $this->category = $this->ad->category->id;
       $this->description = $this->ad->description;
       $this->loadedImages = $this->ad->images;
       if($this->loadedImages){
            $tempImageLoaded = $this->ad->images->where('featured', 1)->first();
            if($tempImageLoaded){
                $this->selectedImage = $tempImageLoaded['url'];
            }
       }
    }
    public function updatedValue()
    {
        $this->value = $this->convertValueToCoin($this->value); 
    }

    public function convertValueToCoin($value){
        if(!$value) return "";
        return $value !== '' && \strval((int) $value) > 0 ? number_format((float) str_replace(',', '.', str_replace('.', '', $value)), 2, ',', '.') : '';
    }

     public function setSelectedImage($index, $isLocal = false){
        $this->isLocalImageSelected = $isLocal;
        if($isLocal){
            if($this->images[$index]){
                $this->selectedImage = $this->images[$index];
            }
            return null;
        }
        $this->selectedImage = $this->loadedImages[$index]['url'];
    }

     public function updated($propertyName){
        if($propertyName == "images"){
            $loaded = $this->loadedImages->where('featured', 1)->first();
            if($loaded){
                $this->selectedImage = $loaded->url;
            }  
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
