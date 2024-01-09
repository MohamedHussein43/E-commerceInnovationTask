<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
    }
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        session()->flash('success_message','Item has been removed');
    }
    public function destroyAll()
    {
        Cart::destroy();
    }
    public function checkout()
    {
        if(session()->has('loginId'))
        {
            $this->setAmountForCheckout();
            return redirect('/checkout');
        }
        else
        {
            return redirect('/login-user');
        }

    }
    public function setAmountForCheckout()
    {
            session()->put('checkout',[
                'discount'  => 0,
                'subtotal'  =>Cart::subtotal(),
                'tax'       =>Cart::tax(),
                'total'     =>Cart::total()
            ]);



    }
    public function render()
    {
        $this->setAmountForCheckout();
        $latest_products = Product::inRandomOrder()->limit(8)->get();
        return view('livewire.cart-component',['latest_products'=>$latest_products])->layout('layouts.base');
    }
}
