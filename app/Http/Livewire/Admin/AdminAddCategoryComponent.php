<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;


class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $parentCategory;
    public $categories;
    public $parent_name;
    public function mount(){
        $this->categories = Category::with('children')->whereNull('parent_id')->get();
        $this-> parent_name = 'Select Parent Category';
    }
    public  function generateslug(){
        $this->slug = Str::slug($this->name);
    }
    public function selectedcategory($name,$id) {
        $this->parent_name = $name;
        $this->parentCategory = $id;
    }
    public function storeCategory(){
        $this -> setCategory($this->name);
        /*
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message','Category has been created successfully!');*/
    }
    public function setCategory($name){
        $category = new Category();
        $category->name = $name;
        $category->slug = Str::slug($name);
        $category->parent_id = $this->parentCategory;

        $category->save();
        session()->flash('message','Category has been created successfully!');
        $this->mount();
        return 1;
    }
    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}
