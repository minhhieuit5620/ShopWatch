<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
/*----------------------------------Front-End--------------------------------------------------*/
//font-end
Route::get('/','App\Http\Controllers\Frontend\HomeController@index');
Route::get('/menu','App\Http\Controllers\Frontend\HomeController@menu')->name('mainmenu');
Route::get('/Footer','App\Http\Controllers\Frontend\HomeController@footer')->name('footer');
Route::get('/DetailProduct/{id?}','App\Http\Controllers\Frontend\ProductDetailController@ctsp')->name('fDetail');
Route::get('/Shop','App\Http\Controllers\Frontend\HomeController@Shop');
Route::get('/PhuKien','App\Http\Controllers\Frontend\HomeController@phukien');
Route::post('/Search','App\Http\Controllers\Frontend\HomeController@Search');
Route::get('/ProductCate/{id?}','App\Http\Controllers\Frontend\HomeController@ProductCate');

//Comment

Route::post('/Comment/{id?}','App\Http\Controllers\Frontend\ProductDetailController@Comment');
Route::get('/Comment/{id?}','App\Http\Controllers\Frontend\ProductDetailController@GetComment');
//Route::get('/Cart/{id?}','App\Http\Controllers\CartController@Addcart');



//Contact
Route::get('/Blog','App\Http\Controllers\Frontend\ContactController@Blog');
Route::get('/DetailBlog/{id?}','App\Http\Controllers\Frontend\ContactController@DetailBlog');
//Comment Blog
Route::post('/Cmt-Blog/{id?}','App\Http\Controllers\Frontend\ContactController@Comment_blog');
Route::get('/Cmt-Blog/{id?}','App\Http\Controllers\Frontend\ContactController@GetComment_blog');
//Giới thiệu
Route::get('/GioiThieu','App\Http\Controllers\Frontend\ContactController@gioithieu');
//Cart
Route::post('/save-cart','App\Http\Controllers\Frontend\CartController@save_cart');
Route::get('/Cart','App\Http\Controllers\Frontend\CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','App\Http\Controllers\Frontend\CartController@delete_to_cart');
Route::post('/update-cart-qty','App\Http\Controllers\Frontend\CartController@update_cart_qty');

//Check-out
Route::get('/login-checkout','App\Http\Controllers\Frontend\CheckoutController@login_checkout');
Route::get('/logout-checkout','App\Http\Controllers\Frontend\CheckoutController@Logout_checkout');
Route::get('/Sign-up','App\Http\Controllers\Frontend\CheckoutController@Sign_up');
Route::post('/add-customer','App\Http\Controllers\Frontend\CheckoutController@add_customer');
Route::get('/Checkout','App\Http\Controllers\Frontend\CheckoutController@checkout');
Route::get('/Order-view','App\Http\Controllers\Frontend\CheckoutController@Order_view');
Route::get('/Customer','App\Http\Controllers\Frontend\CheckoutController@Customer');

//Customer
Route::post('/EditCustomer/{id?}','App\Http\Controllers\Frontend\CheckoutController@EditCustomer');
Route::get('/Order_detail/{id?}','App\Http\Controllers\Frontend\CheckoutController@Order_detail_view');
Route::post('/save-checkout-customer','App\Http\Controllers\Frontend\CheckoutController@save_checkout_customer');
Route::get('/save-checkout-customer','App\Http\Controllers\Frontend\CheckoutController@save_checkout_customer');
Route::post('/login-customer','App\Http\Controllers\Frontend\CheckoutController@login_customer');

/*----------------------------------End Front-End--------------------------------------------------*/


/*----------------------------------Start Back-End--------------------------------------------------*/
// back-end
//Route::get('/Admin','App\Http\Controllers\Admin\HomeController@thongke')->name('layout');

Route::get('/Admin','App\Http\Controllers\Admin\HomeController@index')->name('productindex');
Route::get('/Admin/Edit-Product/{id?}','App\Http\Controllers\Admin\HomeController@edit')->name('productedit');
Route::post('/Admin/Put-Product/{id?}','App\Http\Controllers\Admin\HomeController@put')->name('productput');
Route::get('/Admin/Remove-Product/{id?}','App\Http\Controllers\Admin\HomeController@remove')->name('productremove');
Route::get('/Admin/create','App\Http\Controllers\Admin\HomeController@addnew')->name('productaddnew');
Route::post('/Admin/Save-Product','App\Http\Controllers\Admin\HomeController@save')->name('productsave');

//Login
Route::get('/Admin/Login','App\Http\Controllers\Admin\HomeController@Login');
Route::post('/Admin/Login-user','App\Http\Controllers\Admin\HomeController@Login_user');
Route::get('/Admin/Logout','App\Http\Controllers\Admin\HomeController@Logout_user');
//Profile
Route::get('/Admin/Profile','App\Http\Controllers\Admin\UserController@Profile');
Route::post('/Admin/Put-Profile/{id?}','App\Http\Controllers\Admin\UserController@Put_Profile');
Route::post('/Admin/PostAvt//{id?}','App\Http\Controllers\Admin\UserController@PostAvt');
//Blog
Route::get('/Admin/Blog','App\Http\Controllers\Admin\BlogController@getBlog')->name('Blogindex');
Route::post('/Admin/Save-Blog','App\Http\Controllers\Admin\BlogController@save')->name('Blogsave');
Route::get('/Admin/Edit-Blog/{id?}','App\Http\Controllers\Admin\BlogController@edit')->name('EditBlog');
Route::post('/Admin/Put-Blog/{id?}','App\Http\Controllers\Admin\BlogController@put')->name('BlogPut');
Route::get('/Admin/Remove-Blog/{id?}','App\Http\Controllers\Admin\BlogController@remove')->name('BlogRemove');
//category
Route::get('/Admin/Category','App\Http\Controllers\Admin\CategoryController@getCate')->name('Cateindex');
Route::get('/Admin/Edit-Category/{id?}','App\Http\Controllers\Admin\CategoryController@edit')->name('EditCate');
Route::post('/Admin/Put-Category/{id?}','App\Http\Controllers\Admin\CategoryController@put')->name('CatePut');
Route::get('/Admin/Remove-Category/{id?}','App\Http\Controllers\Admin\CategoryController@remove')->name('CateRemove');
Route::post('/Admin/Save-Category','App\Http\Controllers\Admin\CategoryController@save')->name('CateSave');
//order
Route::get('/Admin/Order','App\Http\Controllers\Admin\OrderController@getOrder')->name('OrderIndex');
Route::get('/Admin/OrderSuccess','App\Http\Controllers\Admin\OrderController@getOrderSuc')->name('OrderSuccess');
Route::get('/Admin/Edit-Order/{id?}','App\Http\Controllers\Admin\OrderController@edit')->name('OrderEdit');
Route::post('/Admin/Put-Order/{id?}','App\Http\Controllers\Admin\OrderController@put')->name('OrderPut');
Route::get('/Admin/Remove-Order/{id?}','App\Http\Controllers\Admin\OrderController@remove')->name('OrderRemove');
Route::get('/Admin/Remove-OrderSuccess/{id?}','App\Http\Controllers\Admin\OrderController@removeSuc')->name('OrderSucRemove');


Route::get('/Admin/DetailOrder/{id?}','App\Http\Controllers\Admin\OrderController@DetailOrder')->name('DetailOrder');
//Customer
Route::get('/Admin/Customer','App\Http\Controllers\Admin\CustomerController@getCus')->name('getCus');
Route::get('/Admin/viewCus/{id?}','App\Http\Controllers\Admin\CustomerController@detailCus')->name('detailCus');
Route::get('/Admin/remove-Cus/{id?}','App\Http\Controllers\Admin\CustomerController@removeCus')->name('removeCus');
Route::get('/Admin/resetPass/{id?}','App\Http\Controllers\Admin\CustomerController@resetPass')->name('resetPass');
/*----------------------------------End Back-End--------------------------------------------------*/