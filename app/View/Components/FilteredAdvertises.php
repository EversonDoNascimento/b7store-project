<?php

namespace App\View\Components;

use App\Models\Advertise;
use App\Services\AdService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilteredAdvertises extends Component
{
    /**
     * Create a new component instance.
     */
    public $products;
    public function __construct()
    {
    
        $this->products = AdService::getAllAds();
 
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filtered-advertises');
    }
}
