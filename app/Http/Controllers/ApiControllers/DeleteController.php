<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class DeleteController extends Controller
{
    public function DeleteCategory($id){
        $category = Category::find($id);
        $result = $category->delete();
        if ($result) {
            return ["Result" => "Category has ben deleted succesfully: " . $id];
        }
        else {
            return ["Result" => "Something went wrong"];
        }

    }
    public function DeleteProduct($id){
        $product = Product::find($id);
        $result = $product->delete();
        if ($result) {
            return ["Result" => "product has ben deleted succesfully: " . $id];
        }
        else {
            return ["Result" => "Something went wrong"];
        }
    }
    //
}
