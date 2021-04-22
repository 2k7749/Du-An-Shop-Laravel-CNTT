<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\Product;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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

//frond-end
Route::get('/',[HomeController::class,'index']);
Route::get('/trang-chu',[HomeController::class,'index']);
Route::get('/all-products',[HomeController::class,'All_Product']);

//danh mục sản phẩm - trang chủ
// Route::get('/danh-muc-san-pham/{category_id}',[CategoryProduct::class,'show_category_home']);
Route::get('/thuong-hieu-san-pham/{brand_id}',[BrandProduct::class,'show_brand_home']);

//Product - trang chủ
Route::get('/chi-tiet-san-pham/{product_id}',[Product::class,'product_detail']);







//Admin
Route::get('/sc_admin', [AdminController::class,'index']);
Route::get('/sc_admin/dashboard', [AdminController::class,'showdashboard']);
Route::post('/sc_admin-dashboard', [AdminController::class,'dashboard']);
Route::get('/sc_admin-logout', [AdminController::class,'logout']);


//CategoryProduct
Route::get('/sc_admin/add-categoryproduct', [CategoryProduct::class,'add_CategoryProduct']);

Route::get('/sc_admin/edit-categoryproduct/{category_product_id}', [CategoryProduct::class,'edit_CategoryProduct']);
Route::get('/sc_admin/delete-categoryproduct/{category_product_id}', [CategoryProduct::class,'delete_CategoryProduct']);

Route::get('/sc_admin/all-categoryproduct', [CategoryProduct::class,'all_CategoryProduct']);

Route::get('/sc_admin/unactive-categoryproduct/{category_product_id}', [CategoryProduct::class,'unactive_CategoryProduct']);
Route::get('/sc_admin/active-categoryproduct/{category_product_id}', [CategoryProduct::class,'active_CategoryProduct']);

Route::post('/sc_admin/save-categoryproduct', [CategoryProduct::class,'save_CategoryProduct']);
Route::post('/sc_admin/update-categoryproduct/{category_product_id}', [CategoryProduct::class,'update_CategoryProduct']);

//BrandProduct
Route::get('/sc_admin/add-brandproduct', [BrandProduct::class,'add_BrandProduct']);

Route::get('/sc_admin/edit-brandproduct/{brand_product_id}', [BrandProduct::class,'edit_BrandProduct']);
Route::get('/sc_admin/delete-brandproduct/{brand_product_id}', [BrandProduct::class,'delete_BrandProduct']);

Route::get('/sc_admin/all-brandproduct', [BrandProduct::class,'all_brandProduct']);

Route::get('/sc_admin/unactive-brandproduct/{brand_product_id}', [BrandProduct::class,'unactive_BrandProduct']);
Route::get('/sc_admin/active-brandproduct/{brand_product_id}', [BrandProduct::class,'active_BrandProduct']);

Route::post('/sc_admin/save-brandproduct', [BrandProduct::class,'save_BrandProduct']);
Route::post('/sc_admin/update-brandproduct/{brand_product_id}', [BrandProduct::class,'update_BrandProduct']); 

//Product
Route::get('/sc_admin/add-product', [Product::class,'add_Product']);

Route::get('/sc_admin/edit-product/{product_id}', [Product::class,'edit_Product']);
Route::get('/sc_admin/delete-product/{product_id}', [Product::class,'delete_Product']);

Route::get('/sc_admin/all-product', [Product::class,'all_Product']);
Route::get('/sc_admin/unactive-product/{product_id}', [Product::class,'unactive_Product']);
Route::get('/sc_admin/active-product/{product_id}', [Product::class,'active_Product']);

Route::post('/sc_admin/save-product', [Product::class,'save_Product']);
Route::post('/sc_admin/update-product/{product_id}', [Product::class,'update_Product']); 


//Cart
Route::post('/save-cart', [CartController::class,'save_cart']);
Route::post('/add-to-cart', [CartController::class,'add_to_cart']);

Route::post('/add-to-cart-ajax', [CartController::class,'add_to_cart_ajax']);

Route::get('/show-cart', [CartController::class,'show_cart']); 
Route::get('/delete-to-cart/{rowId}', [CartController::class,'delete_to_cart']);
Route::post('/update-cart-quantity', [CartController::class,'update_to_cart']);
Route::post('/update-cart-quantity-ajax', [CartController::class,'update_to_cart_ajax']);


// check out
Route::get('/login-checkout', [CheckoutController::class,'login_checkout']);
Route::post('/login-customer', [CheckoutController::class,'login_customer']);
Route::get('/logout-checkout', [CheckoutController::class,'logout_checkout']);
Route::post('/add-customer', [CheckoutController::class,'add_customer']);
Route::get('/checkout', [CheckoutController::class,'checkout']);
Route::post('/save-infor-shipping', [CheckoutController::class,'save_infor_shipping']);
Route::get('/payment', [CheckoutController::class,'payment']);
Route::post('/order-place', [CheckoutController::class,'order_place']);
Route::get('/show-cart-checkout', [CheckoutController::class,'show_cart_checkout']);
Route::post('/update-cart-quantity-checkout', [CheckoutController::class,'update_to_cart']);



//ORDER
Route::get('/sc_admin/manage-order', [AdminController::class,'manage_order']);
Route::get('/sc_admin/view-order/{orderId}', [AdminController::class,'view_order']);

//Login - Logout


