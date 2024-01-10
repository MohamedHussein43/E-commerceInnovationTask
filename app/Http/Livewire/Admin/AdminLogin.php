<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Auth;
class AdminLogin extends Component
{
    public $email;
    public $password;

    public function mount(){
        $this->email = "";    
        $this->password = "";    
    }
    public function save()
    {
        if(Auth::guard('admin')->attempt(['email'=>$this->email, 'password'=>$this->password, 'status'=>1]))
        {
            $this->email = "from save";    
            $this->password = "password form save";
            session()->put('loginId',1);
            return redirect("/dashboard");
        }
        else{ 
         return redirect()->back()->with("error_message","Invalid email or password!");
        }
      
    }
    public function render()
    {
        return view('livewire.admin.admin-login')->layout('layouts.base');
    }
}
