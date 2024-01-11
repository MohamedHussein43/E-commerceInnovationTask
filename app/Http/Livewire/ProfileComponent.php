<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Order;
use App\Models\Admin;
use Livewire\Component;
use Session;
use Auth;
class ProfileComponent extends Component
{
    public function render()
    {
        if(!Auth::guard('admin')->check())
        {
            $user = User::where('id',Session::get('loginId'))->first();
            $order = Order::where('user_id',Session::get('loginId'))->count();
            return view('livewire.profile-component',['user'=>$user,'order'=>$order])->layout('layouts.base');
        }
        else{
            $user = Admin::where('id',Auth::guard('admin')->user()->id)->first();
            $order = 0;
            return view('livewire.profile-component',['user'=>$user,'order'=>$order])->layout('layouts.base');
        }
    }
}
