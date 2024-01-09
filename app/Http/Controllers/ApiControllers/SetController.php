<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use Illuminate\Http\UploadedFile;
use Validator;

class SetController extends Controller
{
    public function setCategory(Request $req){
        $roles = array(
            "name" => "required"
        );
        
        $validator = Validator::make($req->all(), $roles);
        if($validator->fails()){
            return $validator->errors();
        }
        else{
           
                $add = new AdminAddCategoryComponent();
                $result = $add->setCategory($req->name);
                if($result){
                    return ["Result" => "Data has been saved successfully!"];
                }
                else{
                    return ["Result" => "Something went wrong"];
                }
         }
    }
    public function setProduct(Request $req){
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

                $add = new AdminAddProductComponent();
                //return ['image' => new UploadedFile(public_path('assets\\images\\products\\' . $req->image), 'customFileName.jpg')];
                $uploadedFile = new UploadedFile(public_path('assets\\images\\products\\' . $req->image), 'customFileName.jpg');
                $result = $add->setProduct($req->name, $req->short_description, $req->description, $req->regular_price, $req->sale_price, $req->SKU, $req->stock_status, $req->featured, $req->quantity, $req->category_id, $uploadedFile);
                if($result){
                    return ["Result" => $result];
                }
                else{
                    return ["Result" => $result];
                }
    }
    }   
    
    //
}
