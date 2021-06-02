<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ProductModel;
use Illuminate\Database\Eloquent\Collection;
use DB;
use Session;

class UserController extends Controller
{
    public function Profile(){
        $order_count=DB::table('order')->count();
        $order_dxl_count=DB::table('order')->where('order_status','Đang chờ xử lí')->count();
        $order_xl_count=DB::table('order')->where('order_status','Đặt hàng thành công')
        ->orWhere('order_status','Hủy đơn hàng')->count();
        $customer_count=DB::table('customer')->count();
        $product_count=ProductModel::count();
        $cate_count=DB::table('category')->count();
        $blog_count=DB::table('blog')->count();
        $user_count=DB::table('user')->count();

        $profile=DB::table('user')->where('id_user',Session::get('id_user'))->get();
        
        return view('Admin.Profile',['product_count'=>$product_count,
        'order_count'=> $order_count,'customer_count'=>$customer_count,
        'cate_count'=>$cate_count,'order_dxl_count'=>$order_dxl_count,
        'order_xl_count'=>$order_xl_count,'blog_count'=>$blog_count,
        'profile'=>$profile,'user_count'=>$user_count]);
    }
    public function Put_Profile(request $req ,$id){
        $data=array();
        $data['full_name']=$req->name;
        $data['user_email']=$req->email;
        $data['address']=$req->address;
        $data['gender']=$req->gender;
        $data['birthday']=$req->birthday;
        $data['phone']=$req->phone;
        $data['status']=$req->has('status')?1:0;
        if($req->checkpassword == "on")
        {
            $this->validate($req,[
                'password'=> 'required|min:3|max:32',
                'passwordAgain'=> 'required|same:password'
            ],[
                'password.required'=> 'Bạn chưa nhập mật khẩu',              
                'password.min'=>'Mật khẩu của bạn phải chứa ít nhất 3 kí tự',
                'password.max'=>'Mật khẩu của bạn chỉ chứa tối đa 32 kí tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same'=>'Mật khẩu của bạn không trùng khớp'
            ]);
              
            $data['password']=md5($req->password);   
        }  
        $data=DB::table('user')->where('id_user',$id)->update($data);
       // $db->status=$req->has('cbtt')?1:0;
       //return redirect()->route('productindex');
       return redirect('/Admin/Profile');
    }
    public function PostAvt(request $req ,$id){
        $path=$req->file(key:'avatar')->storeAS();
    }
}
