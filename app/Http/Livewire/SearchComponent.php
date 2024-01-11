<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Cart;
class SearchComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $search;
    public $product_cat;
    public $product_cat_id;
    public $categoryChildren;
    public $category_name;

    public function mount(){
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect('/shop');
    }
    private function getLatest(){
        $categories = Category::all();
        $latestProducts = [];
        foreach ($categories as $category) {
            // Retrieve the latest product for each category
            $latestProduct = $category->products()->latest()->first();

            if ($latestProduct) {
                $latestProducts[] = $latestProduct;
            }
        }
        return $latestProducts;
    }
    public function render()
    {
            $products = Product::where('name','like','%'.$this->search .'%')->where('category_id','like','%'.$this->product_cat_id.'%')->paginate($this->pagesize);
            $categories = Category::where('parent_id', null)->get();
            $popular_products = $this->getLatest();
            $category = Category::find($this->product_cat_id);
            
            $this->category_name = $category->name;
            $this->categoryChildren = $category->children;
            $products = $category->allProducts();

        return view('livewire.search-component',['products'=>$products,'categories'=>$categories,'popular_products'=>$popular_products])->layout('layouts.base');
    }
}
