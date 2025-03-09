<?php

namespace App\Livewire;

use Livewire\Component;

class Gallery extends Component
{


    public $images;
    public $featured;
    public function render()
    {
        return view('livewire.gallery');
    }

    public function mount($images){
        $this->images = $images;
        $this->featured = $images->first()->url;
       
    }

    public function setMainImage($image){
        $this->featured = $image['url'];

    }
}
