<?php

namespace App\View\Components;

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
        //
        $this->products = [
           ['title' => 'Bola de futebol', 'price' => 'R$ 250', 'photo' => 'https://placehold.co/600x400/png', 'href' => '#'],
           ['title' => 'Tênis vans Baby - 1 ano', 'price' => 'R$ 189,99', 'photo' => 'https://placehold.co/600x400/png', 'href' => '#'],
           ['title' => 'Controle PS4 - Preto', 'price' => 'R$ 275,00', 'photo' => 'https://placehold.co/600x400/png', 'href' => '#'],
           ['title' => 'Volkswagen Fusca 68', 'price' => 'R$ 34.990,00', 'photo' => 'https://placehold.co/600x400/png', 'href' => '#'],
           ['title' => 'Volkswagen Polo 2015 - Azul', 'price' => 'R$ 67.900,00', 'photo' => 'https://placehold.co/600x400/png', 'href' => '#'],
           ['title' => 'Bola de Basquete Spalding - NBA', 'price' => 'R$ 190,36', 'photo' => 'https://placehold.co/600x400/png', 'href' => '#'],
           ['title' => 'MacBook Pro', 'price' => 'R$ 8.349,10', 'photo' => 'https://placehold.co/600x400/png', 'href' => '#'],           
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filtered-advertises');
    }
}
