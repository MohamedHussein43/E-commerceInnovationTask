<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use Illuminate\Http\UploadedFile;
use Validator;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
class PlaceOrderController extends Controller
{
    public function placeOrder(Request $request){
        $roles = array(
             'product'          =>'required',
             'product.id'       =>'required',
             'product.quantity' =>'required',
             'firstname'        =>'required',
             'lastname'         =>'required',
             'email'            =>'required|email',
             'mobile'           =>'required|numeric',
             'line1'            =>'required',
             'city'             =>'required',
             'province'         =>'required',
             'country'          =>'required',
             'zipcode'          =>'required',
             "tax"              =>'required',
             "discount"         =>'required',
             
        );
        $validator = Validator::make($request->all(), $roles);
        if($validator->fails()){
            return $validator->errors();
        }
        $product = Product::find($request->product['id']);
        if ($product)
        {
            $product_sale_price = $product->sale_price;
        
        //return $product;
        $order = new Order();
        $order->user_id                 = 1;
        $order->subtotal                = $product_sale_price;
        $order->discount                = $request-> discount;
        $order->tax                     = $request-> tax;
        $order->total                   = $product_sale_price + $request-> tax;
        $order->firstname               = $request->firstname;
        $order->lastname                = $request->lastname;
        $order->email                   = $request->email;
        $order->mobile                  = $request->mobile;
        $order->line1                   = $request->line1;
        $order->line2                   = $request->line2;
        $order->city                    = $request->city;
        $order->province                = $request->province;
        $order->country                 = $request->country;
        $order->zipcode                 = $request->zipcode;
        $order->status                  = 'ordered';
        $order->is_shipping_different   = $request->ship_to_different ? 1:0;
        $result = $order->save();

        $orderItem = new OrderItem();
        $orderItem->product_id = $request->product['id'];
        $orderItem->order_id = $order->id;
        $orderItem->price = $order->total;
        $orderItem->quantity = $request->product['quantity'];
        if($product->quantity >= $request->product['quantity'])
        {
            $product->quantity = $product->quantity - $request->product['quantity'];
            $product->save();
            $orderItem->save();
        }
        else{
            return ["Result" => "This product out of stock!"];
        }
    
        if($result){
            return ["Result" => $result];
        }
        else{
            return ["Result" => $result];
        }
    }
    return ["Result" => "This product does not exist!"];
    }
}
