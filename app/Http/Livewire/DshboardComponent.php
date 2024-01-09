<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Session;
class DshboardComponent extends Component
{
    public $totalamount;
    public function render()
    {
        $users =array();
        $orders =array();
        $ordersItems =array();

        if(Session::has('loginId')){
            $users = User::all();
            $orders = Order::all();
            $ordersItems = OrderItem::all();
        }
        $popular_products = Product::inRandomOrder()->limit(8)->get();
        $latest_products = Product::inRandomOrder()->limit(8)->get();
        return view('FrontEnd.dshboard-component',['users'=>$users,'orders'=>$orders,'ordersItems'=>$ordersItems,'popular_products'=>$popular_products,'latest_products'=>$latest_products])->layout('layouts.base');
        //return view('FrontEnd.dshboard-component',compact('data'))->layout('layouts.base');
    }
}
