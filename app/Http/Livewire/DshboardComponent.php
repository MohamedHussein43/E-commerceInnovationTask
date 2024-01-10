<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Livewire\Component;
use Session;
use Auth;
class DshboardComponent extends Component
{
    public $totalamount;
    public $vendors;
    public $tableType = 0;

    public function userOrVendor($type){
        $this->tableType = $type;
    }

    public function render()
    {
        $users =array();
        $orders =array();
        $ordersItems =array();

        if(Auth::guard('admin')->user()->type == 'superadmin'){
            $users = User::all();
            $orders = Order::all();
            $ordersItems = OrderItem::all();
            $this->vendors = Vendor::all();
        }
        $popular_products = Product::inRandomOrder()->limit(8)->get();
        $latest_products = Product::inRandomOrder()->limit(8)->get();
        return view('FrontEnd.dshboard-component',['users'=>$users,'orders'=>$orders,'ordersItems'=>$ordersItems,'popular_products'=>$popular_products,'latest_products'=>$latest_products])->layout('layouts.base');
        //return view('FrontEnd.dshboard-component',compact('data'))->layout('layouts.base');
    }
}
