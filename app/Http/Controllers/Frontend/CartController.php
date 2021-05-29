<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
//use App\Cart;
use Session;
use Cart;
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request){
    	
    	$productId = $request->productid_hidden;
    	$quantity = $request->qty;
    	$product_info = DB::table('product')->where('id',$productId)->first();
        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        //Cart::destroy();
        //return view('Cart'); 

    	$data['id'] = $product_info->id;
    	$data['qty'] = $quantity;
    	$data['name'] = $product_info->nameProduct;
    	$data['price'] = $product_info->price;
    	$data['weight'] = '123';
    	$data['options']['image'] = $product_info->image;
        $data['tt']=$data['qty']* $product_info->price;
    	Cart::add($data);
        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Thêm vào giỏ hàng thành công'
        ]);
    	// return Redirect::to('/Cart');
    	return redirect()->back();
    }
    public function show_cart(){
    	//$show_slide = DB::table('slider')->get();
    	//$show_category = DB::table('category')->get();
        return view('Cart'); 
    	//return view('pages.cart.show_cart')->with('show_category',$show_category)
    	//->with('show_slide',$show_slide);
    }
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        //Cart::add($data);
        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Xóa sản phẩm khỏi giỏ hàng thành công'
        ]);
        return Redirect::to('/Cart');
    }
    public function update_cart_qty(Request $request){
        //lấy dữ liệu trong form về thì phải có request
        $rowId=$request->rowId_cart;
        $qty=$request->cart_quantity;
        Cart::update($rowId,$qty);//chỉ số $a trong  Cart::update($rowId,$a) là chỉ số muốn đưa về
        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Cập nhật giỏ hàng thành công'
        ]);
        return Redirect::to('/Cart');
    }
}
