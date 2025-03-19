<?php

namespace App\Livewire;

use App\Services\AdService;
use Livewire\Component;

class AdEdit extends Component
{
    public $id;
    public $ad;
    public function render()
    {   
        $this->ad = AdService::getSingleAdById($this->id);
        return view('livewire.ad-edit');
    }
}
