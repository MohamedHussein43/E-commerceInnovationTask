<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class GetController extends Controller
{
    //
    public function ListProducts($id = null){
        return $id? Product::find($id) : Product::all();
    }
    public function GetProductByName($name = null){
        return $name? Product::where('name',$name)->first() : ["name" => "You have to enter a name"];        
    }
    public function ListCategories(){
        return Category::all();
    }
}
