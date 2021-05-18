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
Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/menu','App\Http\Controllers\HomeController@menu')->name('mainmenu');
Route::get('/Footer','App\Http\Controllers\HomeController@footer')->name('footer');
Route::get('/DetailProduct/{id?}','App\Http\Controllers\ProductDetailController@ctsp')->name('fDetail');
Route::get('/Shop','App\Http\Controllers\HomeController@Shop');
Route::get('/PhuKien','App\Http\Controllers\HomeController@phukien');
Route::post('/Search','App\Http\Controllers\HomeController@Search');
Route::get('/ProductCate/{id?}','App\Http\Controllers\HomeController@ProductCate');
//Route::get('/Cart/{id?}','App\Http\Controllers\CartController@Addcart');

//Contact
Route::get('/Blog','App\Http\Controllers\ContactController@Blog');
Route::get('/DetailBlog/{id?}','App\Http\Controllers\ContactController@DetailBlog');

Route::get('/GioiThieu','App\Http\Controllers\ContactController@gioithieu');
//Cart
Route::post('/save-cart','App\Http\Controllers\CartController@save_cart');
Route::get('/Cart','App\Http\Controllers\CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','App\Http\Controllers\CartController@delete_to_cart');
Route::post('/update-cart-qty','App\Http\Controllers\CartController@update_cart_qty');

//Check-out
Route::get('/login-checkout','App\Http\Controllers\CheckoutController@login_checkout');
Route::get('/logout-checkout','App\Http\Controllers\CheckoutController@Logout_checkout');
Route::get('/Sign-up','App\Http\Controllers\CheckoutController@Sign_up');
Route::post('/add-customer','App\Http\Controllers\CheckoutController@add_customer');
Route::get('/Checkout','App\Http\Controllers\CheckoutController@checkout');
Route::get('/Order-view','App\Http\Controllers\CheckoutController@Order_view');
Route::post('/save-checkout-customer','App\Http\Controllers\CheckoutController@save_checkout_customer');
Route::post('/login-customer','App\Http\Controllers\CheckoutController@login_customer');

/*----------------------------------End Front-End--------------------------------------------------*/


/*----------------------------------Back-End--------------------------------------------------*/
// back-end
//Route::get('/Admin','App\Http\Controllers\Admin\HomeController@thongke')->name('layout');
Route::get('/Admin','App\Http\Controllers\Admin\HomeController@index')->name('productindex');
Route::get('/Admin/Edit-Product/{id?}','App\Http\Controllers\Admin\HomeController@edit')->name('productedit');
Route::post('/Admin/Put-Product/{id?}','App\Http\Controllers\Admin\HomeController@put')->name('productput');
Route::get('/Admin/Remove-Product/{id?}','App\Http\Controllers\Admin\HomeController@remove')->name('productremove');
Route::get('/Admin/create','App\Http\Controllers\Admin\HomeController@addnew')->name('productaddnew');
Route::post('/Admin/Save-Product','App\Http\Controllers\Admin\HomeController@save')->name('productsave');

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

/*----------------------------------End Back-End--------------------------------------------------*/