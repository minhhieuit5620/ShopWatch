<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ProductModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

class UserController extends Controller
{

    public function get_All_User(){
        $order_count=DB::table('order')->count();
        $order_dxl_count=DB::table('order')->where('order_status','Đang chờ xử lí')->count();
        $order_xl_count=DB::table('order')->where('order_status','Đặt hàng thành công')
        ->orWhere('order_status','Hủy đơn hàng')->count();
        $customer_count=DB::table('customer')->count();
        $product_count=ProductModel::count();
        $cate_count=DB::table('category')->count();
        $blog_count=DB::table('blog')->count();
        $user_count=DB::table('user')->count();


        $get_All_User=DB::table('user')->join('role','user.role_id','=','role.role_id')->get();
        return view('Admin.User',['product_count'=>$product_count,
        'order_count'=> $order_count,'customer_count'=>$customer_count,
        'cate_count'=>$cate_count,'order_dxl_count'=>$order_dxl_count,
        'order_xl_count'=>$order_xl_count,'blog_count'=>$blog_count,
        'user_count'=>$user_count])->with('get_All_User',$get_All_User);

    }
    public function Add_User(request $req){
        $dt_user=array();
        $dt_user['full_name']=$req->name;
        $dt_user['user_email']=$req->email;
        $dt_user['address']=$req->address;
        $dt_user['password']=md5($req->name);
        $dt_user['gender']=$req->gender;
        $dt_user['birthday']=$req->birthday;
        $dt_user['phone']=$req->phone;
        $dt_user['role_id']=$req->role_id;
        $dt_user['status']=$req->status;
        // if($req->role_id='Admin'){
        //     $dt_user['role_id']=1;
        // }elseif($req->role_id='Manager'){
        //     $dt_user['role_id']=2;
        // }
        // elseif($req->role_id='Author'){
        //     $dt_user['role_id']=3;
        // }
        // elseif($req->role_id='User'){
        //     $dt_user['role_id']=4;
        // }        
        // elseif($req->status='YES'){
        //     $dt_user['status']=1;
        // }elseif($req->status='NO'){
        //     $dt_user['status']=0;
        // }
       
        $dt_user['startday']=$req->start_day;
        $dt_user['avartar']=$req->image;
        $dt_user=DB::table('user')->insert($dt_user);
        return redirect::to('Admin/User');
    }
    public function Edit_User($id){
        
        $order_count=DB::table('order')->count();
        $order_dxl_count=DB::table('order')->where('order_status','Đang chờ xử lí')->count();
        $order_xl_count=DB::table('order')->where('order_status','Đặt hàng thành công')
        ->orWhere('order_status','Hủy đơn hàng')->count();
        $customer_count=DB::table('customer')->count();
        $product_count=ProductModel::count();
        $cate_count=DB::table('category')->count();
        $blog_count=DB::table('blog')->count();
        $user_count=DB::table('user')->count();

        $get_id=DB::table('user')->where('id_user',$id)->get();
        //return view('Admin.Lophocs.edit',['db'=>$db]);
        return view('Admin/EditUser',['product_count'=>$product_count,
        'order_count'=> $order_count,'customer_count'=>$customer_count,
        'cate_count'=>$cate_count,'order_dxl_count'=>$order_dxl_count,
        'order_xl_count'=>$order_xl_count,'blog_count'=>$blog_count,
        'user_count'=>$user_count])->with('get_id',$get_id);
    }
    public function Delete_User($id){
        
        DB::table('user')->where('id_user',$id)->delete();
        //return view('Admin.Lophocs.edit',['db'=>$db]);
        return redirect::to('Admin/User');
    }
    //thông tin người dùng đang truy cập
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
    //sửa prf online
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
       return back();
    }
    public function PostAvt(request $req ,$id){
        $path=$req->file(key:'avatar')->storeAS();
    }
}
