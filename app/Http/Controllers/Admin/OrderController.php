<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Admin\OrderModel;
use DB;
class OrderController extends Controller
{
    public function getOrder(){
        $order=DB::table('customer')//->where('customer_id',$customer_id)
        ->join('order','customer.customer_id','=','order.customer_id')
        ->join('order_detail','order.order_id','=','order_detail.order_id')
        ->join('shipping','shipping.shipping_id','=','order.shipping_id')
        ->where('order_status','Đang chờ xử lí')
        ->get();
        $order_count=DB::table('order')->count();
        $order_dxl_count=DB::table('order')->where('order_status','Đang chờ xử lí')->count();
        $order_xl_count=DB::table('order')->where('order_status','Đặt hàng thành công')
        ->orWhere('order_status','Hủy đơn hàng')->count();
        $customer_count=DB::table('customer')->count();
        $product_count=DB::table('product')->count();
        $cate_count=DB::table('category')->count();
        $blog_count=DB::table('blog')->count();
        // $order=DB::table('order')->join('order_detail','order.order_id','=','order_detail.order_id')
        // ->where('order_status','Đang chờ xử lí')->get();
        return view('Admin.Order',['product_count'=>$product_count,
        'order_count'=> $order_count,'customer_count'=>$customer_count,
        'cate_count'=>$cate_count,'order_dxl_count'=>$order_dxl_count,
        'order_xl_count'=>$order_xl_count,'blog_count'=>$blog_count])->with('order',$order);
    }
    public function getOrderSuc(){
        $orderSuc=DB::table('customer')//->where('customer_id',$customer_id)
        ->join('order','customer.customer_id','=','order.customer_id')
        ->join('order_detail','order.order_id','=','order_detail.order_id')
        ->join('shipping','shipping.shipping_id','=','order.shipping_id')
        ->where('order_status','Đặt hàng thành công')->orWhere('order_status','Hủy đơn hàng')
        ->get();
        $order_count=DB::table('order')->count();
        $order_dxl_count=DB::table('order')->where('order_status','Đang chờ xử lí')->count();
        $order_xl_count=DB::table('order')->where('order_status','Đặt hàng thành công')
        ->orWhere('order_status','Hủy đơn hàng')->count();
        $customer_count=DB::table('customer')->count();
        $product_count=DB::table('product')->count();
        $cate_count=DB::table('category')->count();
        $blog_count=DB::table('blog')->count();
        // $order=DB::table('order')->join('order_detail','order.order_id','=','order_detail.order_id')
        // ->where('order_status','Đang chờ xử lí')->get();
        return view('Admin.OrderSuccess',['product_count'=>$product_count,
        'order_count'=> $order_count,'customer_count'=>$customer_count,
        'cate_count'=>$cate_count,'order_dxl_count'=>$order_dxl_count,
        'order_xl_count'=>$order_xl_count,'blog_count'=>$blog_count])->with('orderSuc',$orderSuc);
    }
    public function getOrderID($id){
        $getOrder=DB::table('customer')//->where('customer_id',$customer_id)
        ->join('order','customer.customer_id','=','order.customer_id')
        ->join('order_detail','order.order_id','=','order_detail.order_id')
        ->join('shipping','shipping.shipping_id','=','order.shipping_id')
        ->where('order.order_id',$id)->get();
        return view('Admin.Order')->with('getOrder',$getOrder);
    }
    public function edit($id){
        if($id!=null){
        $getOrderID=DB::table('customer')//->where('customer_id',$customer_id)
        ->join('order','customer.customer_id','=','order.customer_id')
        ->join('order_detail','order.order_id','=','order_detail.order_id')
        ->join('shipping','shipping.shipping_id','=','order.shipping_id')
        ->where('order.order_id',$id)->get();
        $order_count=DB::table('order')->count();
        $order_dxl_count=DB::table('order')->where('order_status','Đang chờ xử lí')->count();
        $order_xl_count=DB::table('order')->where('order_status','Đặt hàng thành công')
        ->orWhere('order_status','Hủy đơn hàng')->count();
        $customer_count=DB::table('customer')->count();
        $product_count=DB::table('product')->count();
        $cate_count=DB::table('category')->count();
        $blog_count=DB::table('blog')->count();
            // $getOrder=DB::table('order')->join('order_detail','order.order_id','=','order_detail.order_id')
            // ->where('order.order_id',$id)->get();
            return view('Admin.EditOrder',['product_count'=>$product_count,
            'order_count'=> $order_count,'customer_count'=>$customer_count,
            'cate_count'=>$cate_count,'order_dxl_count'=>$order_dxl_count,
            'order_xl_count'=>$order_xl_count,'blog_count'=>$blog_count])->with('getOrderID',$getOrderID);
        }
       
         return redirect()->route('OrderIndex');
    }
    public function put(Request $req,$id=null){
        $id=$req->input('order_id');//lat phat tao 1 hiden ten la txtid trong view
        if($id!=null){
            $db=OrderModel::find($id);
            if($db!=null){
                $db->order_id=$id;
                $db->order_status=$req->input('order_status');
                         
                $db->save();
            }
            
        }
        return redirect()->route('OrderIndex');
        // $data=array();
        // $data['product_name']=$req->product_name;
        // $data['price']=$req->price;
        // $data['order_total']=$req->order_total;
        // $data['customer_name']=$req->customer_name;
        // $data['customer_phone']=$req->product_quantity;
        // $data['shipping_address']=$req->shipping_address;
        // $data['shipping_note']=$req->shipping_note;
        // $data['order_status']=$req->order_status;
        // $data['product_quantity']=$req->product_quantity;
        // DB::table('customer')
        // ->join('order','customer.customer_id','=','order.customer_id')
        // ->join('order_detail','order.order_id','=','order_detail.order_id')
        // ->join('shipping','shipping.shipping_id','=','order.shipping_id')
        // ->where('order.order_id',$id)->update($data);

    }
    public function remove($id){
        
        DB::table('order')->where('order_id',$id)->delete();
        //return view('Admin.Lophocs.edit',['db'=>$db]);
    return redirect()->route('OrderIndex');
    }
    public function removeSuc($id){
        
        DB::table('order')->where('order_id',$id)->delete();
        //return view('Admin.Lophocs.edit',['db'=>$db]);
    return redirect()->route('OrderSuccess');
    }
    public function save(Request $req){
        $id=$req->input('order_id');//lat phat tao 1 hiden ten la txtid trong view
        if($id!=null){
            $db=new OrderModel();

            $data=array();
                //$data['order_status']=$req->order_status;
                $data['order_total']=$req->order_total;
               // $data['order_status']=$req->order_status;
                DB::table('order')->where('order_id',$id)->insert($data);
                
                //$db->save();

            //return view('Admin.Lophocs.edit',['db'=>$db]);
        }

        return redirect()->route('OrderIndex');
    }

}
