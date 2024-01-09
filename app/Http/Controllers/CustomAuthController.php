<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Login;
use Illuminate\Database\Console\Seeds\SeedCommand;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Session;
class CustomAuthController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function registerUser(Request $request){
       $request->validate([
          'fname'=>'required|regex:/^[\pL\s]+$/u',
          'lname'=>'required|regex:/^[\pL\s]+$/u',
          'email'=>'required|email|unique:users|max:25',
          'password'=>'required|min:5|max:20',
          'phone'=>'required|numeric',
       ]);
       $user = new User();
       $user->first_name = $request->fname;
       $user->last_name = $request->lname;
       $user->phone = $request->phone;
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $res = $user->save();
       if ($res)
       {
           return redirect('login-user')->with('success','You have registered successfully');
       }else
       {
           return back()->with('fail','something wrong');
       }

    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email|max:25',
            'password'=>'required|min:5|max:20',
        ]);
        //$user = User::where('email','=',$request->email)->first();
        $user = User::where('email',$request->email)->first();
        if ($user){
            if (Hash::check($request->password, $user->password)){
                $request->session()->put('loginId',$user->id);
                $request->session()->put('utype',$user->utype);
                $request->session()->put('first_name',$user->first_name);
                if($user->utype==='ADM')
                    return redirect('dashboard');
                else
                    return redirect('/');
            }else{
                return back()->with('fail','Password not matches.');
            }
        }else{
            return back()->with('fail','This email is not registered.');
        }
    }
    public function dashboard(){
        $data =array();
        if(Session::has('loginId')){
            $data = User::where('id',Session::get('loginId'))->first();
        }
        return view('FrontEnd.dshboard-component',compact('data'));
    }
    public function logout(){
        if(Session()->has('loginId')){
//            Session()->pull('loginId');
//            Session()->forget('loginId');
            session()->flush();
            return redirect('login-user');
        }
    }
    public function deleteUser($id){
        $data = User::find($id);
        $data->delete();
        session()->flash('danger','User has been deleted successfully!');
        return redirect('/dashboard');
    }
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('danger','Category has been deleted successfully!');
        return redirect('/admin/categories');
    }
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('danger','Product has been deleted successfully!');
        return redirect('/admin/products');
    }
}
