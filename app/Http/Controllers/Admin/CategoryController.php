<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin\CategoryModel;
class CategoryController extends Controller
{
    public function getCate(){
        $order_count=DB::table('order')->count();
        $order_dxl_count=DB::table('order')->where('order_status','Đang chờ xử lí')->count();
        $order_xl_count=DB::table('order')->where('order_status','Đặt hàng thành công')
        ->orWhere('order_status','Hủy đơn hàng')->count();
        $customer_count=DB::table('customer')->count();
        $product_count=DB::table('product')->count();
        $cate_count=DB::table('category')->count();
        $blog_count=DB::table('blog')->count();
        $allCate=DB::table('category')->get();
        return view('Admin.Category',['product_count'=>$product_count,
        'order_count'=> $order_count,'customer_count'=>$customer_count,
        'cate_count'=>$cate_count,'order_dxl_count'=>$order_dxl_count,
        'order_xl_count'=>$order_xl_count,'blog_count'=>$blog_count])->with('allCate',$allCate);
    }

    public function edit($id)
    {
        if($id!=null){
            $db=DB::table('category')->where('id',$id)->get();
            $order_count=DB::table('order')->count();
            $order_dxl_count=DB::table('order')->where('order_status','Đang chờ xử lí')->count();
            $order_xl_count=DB::table('order')->where('order_status','Đặt hàng thành công')
            ->orWhere('order_status','Hủy đơn hàng')->count();
            $customer_count=DB::table('customer')->count();
            $product_count=DB::table('product')->count();
            $cate_count=DB::table('category')->count();
            $blog_count=DB::table('blog')->count();
            return view('Admin.EditCate',['db'=>$db,'product_count'=>$product_count,
            'order_count'=> $order_count,'customer_count'=>$customer_count,
            'cate_count'=>$cate_count,'order_dxl_count'=>$order_dxl_count,
            'order_xl_count'=>$order_xl_count,'blog_count'=>$blog_count]);
        }

        return redirect()->route('Cateindex');//lat phai tao route co ten la alophocindex
    }
    public function put(Request $req,$id=null)
    {
        $id=$req->input('txtid');//lat phat tao 1 hiden ten la txtid trong view
        if($id!=null){
            $db=CategoryModel::find($id);
            if($db!=null){
                $db->id=$id;
                $db->nameCategory=$req->input('txtname');
                $db->image=$req->input('txtimg');
                $db->status=$req->has('cbtt')?1:0;
                $db->note=$req->input('txtnote');                   
                $db->save();
            }
            //return view('Admin.Lophocs.edit',['db'=>$db]);
        }

        return redirect()->route('Cateindex');//lat phai tao route co ten la alophocindex
    }
    public function remove($id){
        
            DB::table('category')->where('id',$id)->delete();
            //return view('Admin.Lophocs.edit',['db'=>$db]);
        

        return redirect()->route('Cateindex');
    }
    public function save(Request $req){
        $id=$req->input('txtid');//lat phat tao 1 hiden ten la txtid trong view
        if($id!=null){
            $db=new CategoryModel();
            $db->id=$id;
            $db->nameCategory=$req->input('txtname');
            $db->image=$req->input('txtimg');
            $db->status=$req->has('cbtt')?1:0;          
            $db->note=$req->input('txtnote'); 
                $db->save();

            //return view('Admin.Lophocs.edit',['db'=>$db]);
        }

        return redirect()->route('Cateindex');
    }
    
}
