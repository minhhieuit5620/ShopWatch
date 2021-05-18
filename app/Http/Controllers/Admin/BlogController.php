<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\BlogModel;
use DB;
class BlogController extends Controller
{
    public function getBlog(){
       
        $order_count=DB::table('order')->count();
        $order_dxl_count=DB::table('order')->where('order_status','Đang chờ xử lí')->count();
        $order_xl_count=DB::table('order')->where('order_status','Đặt hàng thành công')
        ->orWhere('order_status','Hủy đơn hàng')->count();
        $customer_count=DB::table('customer')->count();
        $product_count=DB::table('product')->count();
        $cate_count=DB::table('category')->count();
        $blog_count=DB::table('blog')->count();

        $get_all_blog=DB::table('blog')->get();

        return view('Admin.Blog',['product_count'=>$product_count,
        'order_count'=> $order_count,'customer_count'=>$customer_count,
        'cate_count'=>$cate_count,'order_dxl_count'=>$order_dxl_count,
        'order_xl_count'=>$order_xl_count,'blog_count'=>$blog_count])->with('get_all_blog',$get_all_blog);
    }
    public function edit($id)
    {
        if($id!=null){
           
            $order_count=DB::table('order')->count();
            $order_dxl_count=DB::table('order')->where('order_status','Đang chờ xử lí')->count();
            $order_xl_count=DB::table('order')->where('order_status','Đặt hàng thành công')
            ->orWhere('order_status','Hủy đơn hàng')->count();
            $customer_count=DB::table('customer')->count();
            $product_count=DB::table('product')->count();
            $cate_count=DB::table('category')->count();
            $blog_count=DB::table('blog')->count();

            $db=DB::table('blog')->where('id',$id)->get();

            return view('Admin.EditBlog',['db'=>$db,'product_count'=>$product_count,
            'order_count'=> $order_count,'customer_count'=>$customer_count,
            'cate_count'=>$cate_count,'order_dxl_count'=>$order_dxl_count,
            'order_xl_count'=>$order_xl_count,'blog_count'=>$blog_count]);
        }

        return redirect()->route('Blogindex');//lat phai tao route co ten la alophocindex
    }
    public function put(Request $req,$id=null)
    {
        $id=$req->input('txtid');//lat phat tao 1 hiden ten la txtid trong view
        if($id!=null){
            $db=BlogModel::find($id);
            if($db!=null){
                $db->id=$id;
                $db->id_cate=$req->input('txtct');
                $db->nameBlog=$req->input('txtname');
                $db->description=$req->input('txtdes');
                $db->image=$req->input('txtimg');
                $db->status=$req->has('cbtt')?1:0;                    
                $db->save();
            }
            //return view('Admin.Lophocs.edit',['db'=>$db]);
        }

        return redirect()->route('Blogindex');//lat phai tao route co ten la alophocindex
    }
    public function save(Request $req){
        $id=$req->input('txtid');//lat phat tao 1 hiden ten la txtid trong view
        if($id!=null){
            $db=new BlogModel();
            $db->id=$id;
            $db->id_cate=$req->input('txtct');
            $db->nameBlog=$req->input('txtname');
            $db->description=$req->input('txtdescription');
            $db->image=$req->input('txtimg');
            $db->status=$req->has('cbtt')?1:0;                    
            $db->save();

            //return view('Admin.Lophocs.edit',['db'=>$db]);
        }

        return redirect()->route('Blogindex');
    }
    public function remove($id){
        
        DB::table('blog')->where('id',$id)->delete();
        //return view('Admin.Lophocs.edit',['db'=>$db]);
    

    return redirect()->route('Blogindex');
}
}
