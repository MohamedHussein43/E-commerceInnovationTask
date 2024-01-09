<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginComponent extends Component
{
    public function render()
    {
        return view('FrontEnd.login-component')->layout('layouts.base');
    }
}
