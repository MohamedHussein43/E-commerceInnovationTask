<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Validator;
class UpdateController extends Controller
{
    public function updateCategory(Request $req){
        $roles = array(
            "name" => "required"
        );
        
        $validator = Validator::make($req->all(), $roles);
        if($validator->fails()){
            return $validator->errors();
        }
        else{
                $category = Category::find($req->id);
                $category->name = $req->name;
                $category->slug = Str::slug($req->name);
                $result = $category->save();

                if ($result) {
                    return ["result" => "Category has been updated successfully: ".$req->id];
                }
                else {
                    return ["result" => "something went wrong"];
                }
    }
    }
    
    public function updateProduct(Request $req) {
        $roles = array(
            "name"              => "required",
            "short_description" => "required",
            "description"       => "required",
            "regular_price"     => "required",
            "sale_price"        => "required",
            "SKU"               => "required",
            "stock_status"      => "required",
            "featured"          => "required",
            "quantity"          => "required",
            "category_id"       => "required",
            "image"      => "required",
        );
        
        $validator = Validator::make($req->all(), $roles);
        if($validator->fails()){
            return $validator->errors();
        }
        else{
                $product = Product::find($req->id);

                $product->slug                  = Str::slug($req->name,'-');
                $product->name                  = $req->name;
                $product->short_description     = $req->short_description;
                $product->description           = $req->description;
                $product->regular_price         = $req->regular_price;
                $product->sale_price            = $req->sale_price;
                $product->SKU                   = $req->SKU;
                $product->stock_status          = $req->stock_status;
                $product->featured              = $req->featured;
                $product->quantity              = $req->quantity;

                $uploadedFile = new UploadedFile(public_path('assets\\images\\products\\' . $req->image), 'customFileName.jpg');
                $imageName = Carbon::now()->timestamp . '.' . $uploadedFile->extension();
                $uploadedFile->storeAs('products', $imageName);
                $product->image = $imageName;

                $product->category_id           = $req->category_id;
                $result                         = $product->save();
                if ($result) {
                    return ["result" => "Product has been updated successfully: ".$req->id];
                }
                else {
                    return ["result" => "something went wrong"];
                }
    }

    }
}
