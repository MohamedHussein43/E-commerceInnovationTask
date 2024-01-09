<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }
    public function addProduct()
    {
        $this -> setProduct($this->name, $this->short_description, $this->description, $this->regular_price, $this->sale_price, $this->SKU, $this->stock_status, $this->featured, $this->quantity, $this->category_id, $this->image);
        /*try {

            $product = new Product();
            $product->name = $this->name;
            $product->slug = $this->slug;
            $product->short_description = $this->short_description;
            $product->description = $this->description;
            $product->regular_price = $this->regular_price;
            $product->sale_price = $this->sale_price;
            $product->SKU = $this->SKU;
            $product->stock_status = $this->stock_status;
            $product->featured = $this->featured;
            $product->quantity = $this->quantity;
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAs('products', $imageName);
            $product->image = $imageName;
            $product->category_id = $this->category_id;
            $product->save();
            session()->flash('message','Product has been created successfully!');
        }
        catch (Exception $e)
        {
            session()->flash('danger','This product slug is already exist or you miss some data.');
        }*/

    }
    public function setProduct($name, $short_description, $description, $regular_price, $sale_price, $SKU, $stock_status, $featured, $quantity, $category_id, $image){
        try {

            $product = new Product();
            $product->slug = Str::slug($name,'-');
            $product->name = $name;
            $product->short_description = $short_description;
            $product->description = $description;
            $product->regular_price = $regular_price;
            $product->sale_price = $sale_price;
            $product->SKU = $SKU;
            $product->stock_status = $stock_status;
            $product->featured = $featured;
            $product->quantity = $quantity;

            $imageName = Carbon::now()->timestamp . '.' . $image->extension();
            $image->storeAs('products', $imageName);
            $product->image = $imageName;

            $product->category_id = $category_id;
            $product->save();
            session()->flash('message','Product has been created successfully!');
            return 1;
            
        }
        catch (Exception $e)
        {
            session()->flash('danger','This product slug is already exist or you miss some data.');
            return $e;
        }
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories])->layout('layouts.base');
    }
}
