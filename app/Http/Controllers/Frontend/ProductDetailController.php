<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\ProductModel;
use  App\Models\CategoryModel;
use  App\Models\MenuModel;
use  App\Models\ProductInfoModel;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use Carbon\Carbon;// thư viện datetime
use Cart;
session_start();
class ProductDetailController extends Controller
{
    public function ctsp($id=null){
        if($id!=null){
            $db=ProductModel::find($id);
            $db1=CategoryModel::find($db->idcategory);
            $db2=ProductModel::where('idcategory','=',$db->idcategory)->get();
            $db3=DB::table('product_info')->where('ProductID',$id)->get();
           // if($prID==$id)
            //$db3=ProductInfoModel::where('ProductID',$prID)->get();
            $get_cmt=DB::table('comment_product')->join('customer','comment_product.id_customer','=','customer.customer_id')
            ->where('id_product',$id)->get();
            // Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
            // $dt = Carbon::create(2018, 10, 18, 14, 40, 16);
            // $dt2 = Carbon::create(2018, 10, 18, 13, 40, 16);
            // $now = Carbon::now();
            // echo $dt->diffForHumans($now); //12 phút trước
            // echo $dt2->diffForHumans($now); //1 giờ trước
           
           // $db3=ProductInfoModel::find($db->$id);
           // $db4=ProductModel::where('ProductID','=',$db->ProductID)->get();
            //$db4=ProductInfoModel::where('ProductID',$id)->get();
            return view('Front.DetailProduct',['db'=>$db,'db1'=>$db1,'db2'=>$db2,'db3'=>$db3,'get_cmt'=>$get_cmt]);
        }
    }
    public function Comment(request $req,$id){
        $customer_id=Session::get('customer_id');
        $cmt=array();
        $cmt['id_customer']=$customer_id;
        $cmt['id_product']=$id;
        $cmt['content']=$req->content;
        $cmt['comment_date']=Carbon::now('Asia/Ho_Chi_Minh');     
        $cmt=DB::table('comment_product')->insert($cmt);
        return redirect()->back();
    }
    // public function GetComment($id){
    //     $get_cmt=DB::table('comment_product')->where('id_product',$id)->get();
    //     return view('/DetailProduct')->with('get_cmt',$get_cmt);
    // }
    

    
}
