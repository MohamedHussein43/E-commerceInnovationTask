<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Livewire\AboutUsComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\EditProfileComponent;
use App\Http\Livewire\ProfileComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\tt;
use Illuminate\Support\Facades\Route;
use \App\Http\Livewire\HomeComponent;
use \App\Http\Livewire\ShopComponent;
use \App\Http\Livewire\CheckoutComponent;
use \App\Http\Livewire\CartComponent;
use \App\Http\Livewire\LoginComponent;
use \App\Http\Livewire\RegisterComponent;
use \App\Http\Livewire\DshboardComponent;
use \App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
/////////////////////////////Main par
Route::get('/',HomeComponent::class)->name('home');

Route::get('/shop',ShopComponent::class)->middleware('alreadyLoggedIn');;

Route::get('/about', AboutUsComponent::class);

Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/cartt',[CartComponent::class,'checkout'])->name('cartt');


Route::get('/tt',tt::class);

Route::middleware('Logedin')->group(function () {
    Route::get('/checkout', CheckoutComponent::class)->name('checkout');
    Route::get('/checkoutCart', [CartComponent::class, 'checkout'])->name('checkout');
});
Route::middleware('Loggedin')->group(function () {
    Route::get('/profile', ProfileComponent::class)->name('profile');
    Route::get('/edit-profile', EditProfileComponent::class)->name('edit.profile');
    Route::post('/edit-profile', [EditProfileComponent::class, 'editProfile'])->name('edit-profile');
});

Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');

Route::get('/search', SearchComponent::class)->name('product.search');

Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');
////////////////Login and Register
Route::get('/login-user',LoginComponent::class)->name('login-user')->middleware('alreadyLoggedIn');

Route::get('/register-user',RegisterComponent::class)->name('register-user')->middleware('alreadyLoggedIn');

Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');

Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('login-user');

Route::get('/logout',[CustomAuthController::class,'logout'])->name('logout');



////////////////////dashboard
Route::middleware('isLoggedIn')->group(function (){
    Route::get('/dashboard',DshboardComponent::class)->name('dashboard');
    Route::get('/deleteUser/{id}',[CustomAuthController::class,'deleteUser'])->name('deleteUser');
    Route::get('/deleteCategory/{id}',[CustomAuthController::class,'deleteCategory'])->name('deleteCategory');
    Route::get('/deleteProduct/{id}',[CustomAuthController::class,'deleteProduct'])->name('deleteProduct');
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct');
});
