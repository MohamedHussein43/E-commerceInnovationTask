<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Order;
use Livewire\Component;
use Session;

class ProfileComponent extends Component
{
    public function render()
    {
        $user = User::where('id',Session::get('loginId'))->first();
        $order = Order::where('user_id',Session::get('loginId'))->count();
        return view('livewire.profile-component',['user'=>$user,'order'=>$order])->layout('layouts.base');
    }
}
