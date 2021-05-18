<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ProductModel;
use Illuminate\Database\Eloquent\Collection;
use DB;
class HomeController extends Controller
{
   
    public function index(Request $req){
        $order_count=DB::table('order')->count();
        $order_dxl_count=DB::table('order')->where('order_status','Đang chờ xử lí')->count();
        $order_xl_count=DB::table('order')->where('order_status','Đặt hàng thành công')
        ->orWhere('order_status','Hủy đơn hàng')->count();
        $customer_count=DB::table('customer')->count();
        $product_count=ProductModel::count();
        $cate_count=DB::table('category')->count();
        $blog_count=DB::table('blog')->count();
        
        $data['sp']=ProductModel::paginate(10);

        if($req->search){
            $data['sp']=ProductModel::where('nameProduct','like','%'.$req->search.'%')->Orderby('id','desc')->paginate(10);

        }
        // if($req->loai){
        //     $data['dsloai']=ProductModel::where('idcategory',$req->loai)->Orderby('id','desc')->paginate(10);
        //     //$dsloai=DB::table('category')->get();

        // }
        //$db=ProductModel::all();
        
        return view('Admin.index',$data,['product_count'=>$product_count,
        'order_count'=> $order_count,'customer_count'=>$customer_count,
        'cate_count'=>$cate_count,'order_dxl_count'=>$order_dxl_count,
        'order_xl_count'=>$order_xl_count,'blog_count'=>$blog_count]);//->with('dsloai',$dsloai);//['data'=>$data]);
    }
    public function edit($id=null)
    {
        if($id!=null){
            $db=ProductModel::find($id);
            $order_count=DB::table('order')->count();
            $order_dxl_count=DB::table('order')->where('order_status','Đang chờ xử lí')->count();
            $order_xl_count=DB::table('order')->where('order_status','Đặt hàng thành công')
            ->orWhere('order_status','Hủy đơn hàng')->count();
            $customer_count=DB::table('customer')->count();
            $product_count=DB::table('product')->count();
            $cate_count=DB::table('category')->count();
            $blog_count=DB::table('blog')->count();
            return view('Admin.editProduct',['db'=>$db,'product_count'=>$product_count,
            'order_count'=> $order_count,'customer_count'=>$customer_count,
            'cate_count'=>$cate_count,'order_dxl_count'=>$order_dxl_count,
            'order_xl_count'=>$order_xl_count,'blog_count'=>$blog_count]);
        }

        return redirect()->route('productindex');//lat phai tao route co ten la alophocindex
    }
    public function put(Request $req,$id=null)
    {
        $id=$req->input('txtid');//lat phat tao 1 hiden ten la txtid trong view
        if($id!=null){
            $db=ProductModel::find($id);
            if($db!=null){
                $db->id=$id;
                $db->idcategory=$req->input('txtcte');
                $db->nameProduct=$req->input('txtname');
                $db->description=$req->input('txtct');
                $db->image=$req->input('txtimg');
                $db->status=$req->has('cbtt')?1:0;
                $db->price=$req->input('txtgb');
                $db->old_price=$req->input('txtgc');
                $db->import_price=$req->input('txtgn');
                $db->quantity=$req->input('txtsl');               
                $db->save();
            }
            //return view('Admin.Lophocs.edit',['db'=>$db]);
        }

        return redirect()->route('productindex');//lat phai tao route co ten la alophocindex
    }
    public function remove($id){
        
            DB::table('product')->where('id',$id)->delete();
            //return view('Admin.Lophocs.edit',['db'=>$db]);
        

        return redirect()->route('productindex');
    }
    //hien thi form them moi
    public function addnew()
    {
        return view('Admin.addProduct');
    }
    //them vao csdl
    public function save(Request $req){
        $id=$req->input('txtid');//lat phat tao 1 hiden ten la txtid trong view
        if($id!=null){
            $db=new ProductModel();

                $db->id=$id;
                $db->idcategory=$req->input('txtcte');
                $db->nameProduct=$req->input('txtname');
                $db->description=$req->input('txtct');
                $db->image=$req->input('txtimg');
                $db->status=$req->has('cbtt')?1:0;
                $db->price=$req->input('txtgb');
                $db->old_price=$req->input('txtgc');
                $db->import_price=$req->input('txtgn');
                $db->quantity=$req->input('txtsl');
                
                $db->save();

            //return view('Admin.Lophocs.edit',['db'=>$db]);
        }

        return redirect()->route('productindex');
    }
    
}
