<?php

namespace App\Livewire;

use Livewire\Component;

class Gallery extends Component
{
    public $advertise;
    public function render()
    {
        return view('livewire.gallery');
    }

    public function mount(){
       
    }

    public function setMainImage($image){
        $this->advertise['main_image'] = $image;
    }
}
