<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use Cart;
use Carbon\Carbon;
session_start();
class CheckoutController extends Controller
{
    public function login_checkout(){
        return view('Login_Checkout');
    }
    public function sign_up(){
        return view('Sign_up');
    }
    public function add_customer(Request $req){
        $data=array();
        $data['customer_name']=$req->customer_name;
        $data['customer_email']=$req->customer_email;
        $data['customer_password']=md5($req->customer_password);
        $data['customer_phone']=$req->customer_phone;

        $customer_id=DB::table('customer')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$req->customer_name);
        return Redirect('/Checkout'); 
    }
    public function checkout(){
        $customer_id=Session::get('customer_id');
        $thong_tin=DB::table('customer')->where('customer.customer_id',$customer_id)->get();
        // print_r($thong_tin);
        return view('/Checkout')->with('thong_tin',$thong_tin);
    }
    public function save_checkout_customer(Request $req){
        $data=array();
        $data['shipping_name']=$req->shipping_name;
        $data['shipping_phone']=$req->shipping_phone;
        $data['shipping_address']=$req->shipping_address;
        $data['shipping_email']=$req->shipping_email;
        $data['shipping_note']=$req->shipping_note;

        $shipping_id=DB::table('shipping')->insertGetId($data);

        //Session::put('shipping_id',$shipping_id);
        //insert_order
        $ord_data=array();
        $ord_data['customer_id']=Session::get('customer_id');
        $ord_data['shipping_id']=$shipping_id;
        $ord_data['order_total']=Cart::total();
        $ord_data['order_status']='Đang chờ xử lí';
        $ord_data['created_at']=Carbon::now('Asia/Ho_Chi_Minh');
        $order_id=DB::table('order')->insertGetId($ord_data);

        //insert order detail
        $content=Cart::content();
        foreach($content as $v_content){
            $ord_d_data=array();
            $ord_d_data['order_id']=$order_id;
            $ord_d_data['product_id']=$v_content->id;
            $ord_d_data['product_name']=$v_content->name;
            $ord_d_data['price']=$v_content->price;
            $ord_d_data['product_quantity']=$v_content->qty;
            $order_d_id=DB::table('order_detail')->insert($ord_d_data);
        }
        Cart::destroy();
        return view('/Order_Success'); 
    }
    public function Order_view(){
        $customer_id=Session::get('customer_id');
        $order=DB::table('customer')//->where('customer_id',$customer_id)
        ->join('order','customer.customer_id','=','order.customer_id')
        ->join('order_detail','order.order_id','=','order_detail.order_id')
        ->join('shipping','shipping.shipping_id','=','order.shipping_id')
        ->where('order.customer_id',$customer_id)->orderby('order.order_id','desc')
        ->get();
        
        $thong_tin=DB::table('customer')->where('customer.customer_id',$customer_id)->get();
        //$order=DB::table('customer')->join('order','customer.$customer_id','=',)
        //->join('order_detail','order.order_id','=','order_detail.order_id');
        //$order=DB::table('customer')->join('order','customer.$customer_id','=','order.customer_id')
        //$order=DB::table('order')->where('customer_id',$customer_id)->first();
       // $ord_d=DB::table('order_detail')->where('order_id',$order->order_id)->first();
        return view('Order_view',['order'=>$order,'thong_tin'=>$thong_tin]);
    }
    public function Logout_checkout(){
        Session::flush();
        return Redirect('/login-checkout');
    }
    public function Login_customer(Request $req){
        
        $email=$req->email_account;
        $password=md5($req->password_account);
        $result=DB::table('customer')->where('customer_email',$email)->where('customer_password',$password)->first();
        if($result){
            Session::put('customer_id',$result->customer_id);     
            return Redirect::to('/Checkout'); 
        }else{
            return Redirect::to('/login-checkout');
        }
       

    }
    public function payment(){

    }
}
