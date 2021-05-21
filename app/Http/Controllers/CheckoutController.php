<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use Cart;
use Carbon\Carbon;
session_start();
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\MessageBag;
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
        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Đặt hàng thành công'
        ]);
    
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
    public function Customer(){
        $customer_id=Session::get('customer_id');
        $thong_tin=DB::table('customer')->where('customer.customer_id',$customer_id)->get();        
        return view('Customer')->with('thong_tin',$thong_tin);
    }
    public function Order_detail_view($id){
        $customer_id=Session::get('customer_id');
        $thong_tin=DB::table('customer')->where('customer.customer_id',$customer_id)->get();        
       $order_detail=DB::table('order')
       ->join('order_detail','order.order_id','=','order_detail.order_id')
       ->join('product','order_detail.product_id','=','product.id')
       ->where('order_detail.order_id',$id)->get();
       return view('/Order_view_detail')->with('order_detail',$order_detail)->with('thong_tin',$thong_tin); 
    }
    public function EditCustomer(request $req,$id){
        //$customer_id=Session::get('customer_id');
        $cus_edit=array();
        
        $cus_edit['customer_name']=$req->txtname;
        $cus_edit['customer_email']=$req->txtemail;
        $cus_edit['customer_phone']=$req->txtphone;   
        if($req->checkpassword == "on")
        {
            $this->validate($req,[
                'password'=> 'required|min:3|max:32',
                'passwordAgain'=> 'required|same:password'
            ],[
                'password.required'=> 'Bạn chưa nhập mật khẩu',
                //  Session::flash('toastr',[
                //     'type' => 'error',
                //     'message' => 'Bạn chưa nhập mật khẩu'
                // ])             
                // 'password.min'=>  Session::flash('toastr',[
                //     'type' => 'error',
                //     'message' => 'Mật khẩu của bạn phải chứa ít nhất 3 kí tự'
                // ]),
                'password.min'=>'Mật khẩu của bạn phải chứa ít nhất 3 kí tự',
                'password.max'=>'Mật khẩu của bạn chỉ chứa tối đa 32 kí tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same'=>'Mật khẩu của bạn không trùng khớp'
            ]);
              
            $cus_edit['customer_password']=md5($req->password);   
        }  
        $cus_edit=DB::table('customer')->where('customer_id',$id)->update($cus_edit);
        Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Cập nhật thông tin thành công !'
        ]); 
        return redirect('/Customer');
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
            Session::flash('toastr',[
                'type' => 'success',
                'message' => 'Đăng nhập thành công'
            ]);    
            return Redirect::to('/Checkout'); 
        }else{
          
            Session::flash('toastr',[
                'type' => 'error',
                'message' => 'Thông tin đăng nhập sai , vui lòng kiểm tra và đăng nhập lại'
            ]);    
            return Redirect::to('/login-checkout');
        }
       

    }
    public function payment(){

    }
}
