<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Cart;
use Session;
class Logedin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function setAmountForCheckout()
    {
        Session::put('checkout',[
            'discount'  => 0,
            'subtotal'  =>Cart::subtotal(),
            'tax'       =>Cart::tax(),
            'total'     =>Cart::total()
        ]);



    }
    public function handle(Request $request, Closure $next)
    {
        if (!Session()->has('loginId')){
            return redirect('login-user')->with('fail','You have to login first.');
        }
        if(!Cart::count()>0 || !session()->has('checkout')){
           // $this->setAmountForCheckout();
            return redirect('/cart');
        }
        return $next($request);
    }
}
