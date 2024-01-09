<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;
class DetailsComponent extends Component
{

    public $slug;
    public $quantity=1;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function increase()
    {
        $this->quantity+=1;
    }
    public function reduce()
    {
        $this->quantity-=1;
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,$this->quantity,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }
    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(4)->get();
        return view('livewire.details-component',['product'=>$product,'popular_products'=>$popular_products,'related_products'=>$related_products])->layout('layouts.base');
    }
}
