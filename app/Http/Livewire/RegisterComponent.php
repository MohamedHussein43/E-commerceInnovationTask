<?php

namespace App\Http\Livewire;

use http\Env\Request;
use Livewire\Component;

class RegisterComponent extends Component
{
    public function render()
    {
        return view('FrontEnd.register-component')->layout('layouts.base');
    }

}
