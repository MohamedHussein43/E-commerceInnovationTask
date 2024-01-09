<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;
use App\Models\Category;
class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;
    public function mount(){
        $this->sorting = "default";
        $this->pagesize = 12;
        //$this->fill(request()->only('search','product_cat','product_cat_id'));
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect('/shop')->with('success','Item added in Cart');
    }

    public function render()
    {
            $products = Product::paginate(12);
            $categories = Category::all();
            $popular_products = Product::inRandomOrder()->limit(4)->get();
        return view('livewire.shop-component',['products'=>$products,'categories'=>$categories,'popular_products'=>$popular_products])->layout('layouts.base');
    }
}
