<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $popular_products = Product::inRandomOrder()->limit(8)->get();
        $latest_products = Product::inRandomOrder()->limit(8)->get();
        $categories = Category::all();
        return view('livewire.home-component',['popular_products'=>$popular_products,'latest_products'=>$latest_products,'categories'=>$categories])->layout('layouts.base');
        //return view("livewire.home-component")->layout('layouts.base');
    }
}
