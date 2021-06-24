<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ProductModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

class HomeController extends Controller
{
   
    public function index(Request $req){
        if(Session::get('id_user')==null){
            echo"
            <div class='alert alert-primary alert-dismissible fade show' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    <span class='sr-only'>Close</span>
                </button>
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            </div>";
            return redirect('/Admin/Login');
            
        }else{
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
            'order_xl_count'=>$order_xl_count,'blog_count'=>$blog_count,'profile'=>$profile,'user_count'=>$user_count]);//->with('dsloai',$dsloai);//['data'=>$data]);
        }
        
    }
    public function edit($id=null)
    {
        if($id!=null){
            $profile=DB::table('user')->where('id_user',Session::get('id_user'))->get();
            $db=ProductModel::find($id);
            $order_count=DB::table('order')->count();
            $order_dxl_count=DB::table('order')->where('order_status','Đang chờ xử lí')->count();
            $order_xl_count=DB::table('order')->where('order_status','Đặt hàng thành công')
            ->orWhere('order_status','Hủy đơn hàng')->count();
            $customer_count=DB::table('customer')->count();
            $product_count=DB::table('product')->count();
            $cate_count=DB::table('category')->count();
            $blog_count=DB::table('blog')->count();
            $user_count=DB::table('user')->count();

            return view('Admin.editProduct',['db'=>$db,'product_count'=>$product_count,
            'order_count'=> $order_count,'customer_count'=>$customer_count,
            'cate_count'=>$cate_count,'order_dxl_count'=>$order_dxl_count,
            'order_xl_count'=>$order_xl_count,'blog_count'=>$blog_count,'profile'=>$profile,'user_count'=>$user_count]);
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
    public function Login(){
        return view('Admin.Login');
    }
    public function Login_user(Request $req){
         
        // $email=$req->email_account;
        // $password=md5($req->password_account);
        // $result=DB::table('customer')->where('customer_email',$email)->where('customer_password',$password)->first();
        $email=$req->user;
        $pass=md5($req->pass);
        $result=DB::table('user')->where('user_email',$email)->where('password',$pass)->first();
        
        if($result){
            Session::put('id_user',$result->id_user);
            return redirect()->route('productindex');
        }else{
            echo"
            <div class='alert alert-primary alert-dismissible fade show' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                <span class='sr-only'>Close</span>
            </button>
            <strong>Thông tin đăng nhập không đúng !</strong> Bạn vui lòng kiểm tra lại thông tin tài khoản và mật khẩu.
        </div>";
            return view('Admin.Login');
        }       
    }
    public function Logout_user(){
        Session::flush();
        return Redirect('Admin/Login');        
    }
   
}
