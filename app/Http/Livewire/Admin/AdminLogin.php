<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminLogin extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-login')->layout('layouts.base');
    }
}
