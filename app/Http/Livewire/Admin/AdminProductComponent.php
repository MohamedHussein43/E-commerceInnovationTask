<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Auth;
class AdminProductComponent extends Component
{
    
    public function render()
    {
        if(Auth::guard('admin')->user()->type == 'superadmin'){
            $products = Product::paginate(10);
        }
        else if(Auth::guard('admin')->user()->type == 'vendor'){
            $products = Product::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->paginate(10);
        }
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.base');
    }
}
