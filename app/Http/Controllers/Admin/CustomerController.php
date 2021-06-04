<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ProductModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

class CustomerController extends Controller
{
    public function getCus(){
        $profile=DB::table('user')->where('id_user',Session::get('id_user'))->get();
        $order_count=DB::table('order')->count();
        $order_dxl_count=DB::table('order')->where('order_status','Đang chờ xử lí')->count();
        $order_xl_count=DB::table('order')->where('order_status','Đặt hàng thành công')
        ->orWhere('order_status','Hủy đơn hàng')->count();
        $customer_count=DB::table('customer')->count();
        $product_count=ProductModel::count();
        $cate_count=DB::table('category')->count();
        $blog_count=DB::table('blog')->count();
        $user_count=DB::table('user')->count();

        $getCus=DB::table('customer')->get();
        return view('Admin.Customer',['product_count'=>$product_count,
        'order_count'=> $order_count,'customer_count'=>$customer_count,
        'cate_count'=>$cate_count,'order_dxl_count'=>$order_dxl_count,
        'order_xl_count'=>$order_xl_count,'blog_count'=>$blog_count,'profile'=>$profile,'user_count'=>$user_count])->with('getCus',$getCus);
    }
    public function detailCus($id){
        $profile=DB::table('user')->where('id_user',Session::get('id_user'))->get();
        $order_count=DB::table('order')->count();
        $order_dxl_count=DB::table('order')->where('order_status','Đang chờ xử lí')->count();
        $order_xl_count=DB::table('order')->where('order_status','Đặt hàng thành công')
        ->orWhere('order_status','Hủy đơn hàng')->count();
        $customer_count=DB::table('customer')->count();
        $product_count=ProductModel::count();
        $cate_count=DB::table('category')->count();
        $blog_count=DB::table('blog')->count();
        $user_count=DB::table('user')->count();

        $cus=DB::table('customer')->where('customer_id',$id)->get();
        $detailCus=DB::table('customer')->join('order','customer.customer_id','=','order.customer_id')
        ->join('order_detail','order.order_id','=','order_detail.order_id')
        ->join('shipping','order.shipping_id','=','shipping.shipping_id')->where('customer.customer_id',$id)->get();

        
        return view('Admin.DetailCustomer',['product_count'=>$product_count,
        'order_count'=> $order_count,'customer_count'=>$customer_count,
        'cate_count'=>$cate_count,'order_dxl_count'=>$order_dxl_count,
        'order_xl_count'=>$order_xl_count,'blog_count'=>$blog_count,
        'profile'=>$profile,'user_count'=>$user_count])->with('detailCus',$detailCus)->with('cus',$cus);
    }
    public function resetPass($id){
        $data=array();
        $data['customer_password']=md5(12345);
        DB::table('customer')->where('customer_id',$id)->update($data);
        return redirect::to('Admin/Customer');
       // return redirect()->getCus();
    }
    public function removeCus($id){

        DB::table('customer')->where('customer_id',$id)->delete();
        return redirect::to('Admin/Customer');
    }
}
