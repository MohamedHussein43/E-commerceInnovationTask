<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Livewire\Component;

class EditProfileComponent extends Component
{
    public $change_password;
    public $password;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public function mount()
    {
        $user = User::where('id',Session::get('loginId'))->first();
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->phone = $user->phone;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'first_name' => 'regex:/^[\pL\s]+$/u',
            'last_name' => 'regex:/^[\pL\s]+$/u',
            'email' => 'email|max:25',
            'phone' => 'numeric',
            'password'=>'min:5|max:20',

        ]);
    }
    public function editProfile(Request $request)
    {
        try {
            $user = User::find(Session::get('loginId'));
                $user->first_name = $request->first_name;

                $user->last_name = $request->last_name;

                $user->email = $request->email;

                $user->phone = $request->phone;

                $user->password =Hash::make($request->password);

            $res = $user->update();
            if ($res) {
                return redirect()->back()->with('success', 'Your data has been edit successfully');
            } else {
                return redirect()->back()->with('fail', 'something wrong');
            }
        }
        catch (Exception $e)
        {
            return redirect()->back()->with('fail', 'This email can\'t be taken');
        }


    }
    public function render()
    {
        $user = User::where('id',Session::get('loginId'))->first();
        $order = Order::where('user_id',Session::get('loginId'))->count();
        return view('livewire.edit-profile-component',['user'=>$user,'order'=>$order])->layout('layouts.base');
    }
}
