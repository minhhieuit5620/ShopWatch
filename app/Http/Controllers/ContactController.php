<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use DB;
use Session;
use Carbon\Carbon;// thư viện datetime
use Cart;
session_start();
class ContactController extends Controller
{
    public function Blog(){
        $bl=DB::table('blog')->orderby('id','asc')->get();
        $cbl=DB::table('cateblog')->orderby('idcate','desc')->get();
        return view('Blog')->with('bl',$bl)->with('cbl',$cbl);
    }
    public function DetailBlog($id){
        //if($id!=null){
         
        $debl=DB::table('blog')->where('id',$id)->get();
        $bl=DB::table('blog')->orderby('id','asc')->get();
        $cbl=DB::table('cateblog')->orderby('idcate','desc')->get();
        $Get_CMT=DB::table('comment_blog')->join('customer','comment_blog.id_customer','=','customer.customer_id')
        ->where('id_blog',$id)->get();
        return view('DetailBlog')->with('debl',$debl)->with('bl',$bl)->with('cbl',$cbl)->with('Get_CMT',$Get_CMT);;
        //return view('DetailBlog');
        //} 
         
    }
    public function gioithieu(){
        $gt=DB::table('gioithieu')->get();
        $bl=DB::table('blog')->orderby('id','asc')->get();
        $cbl=DB::table('cateblog')->orderby('idcate','desc')->get();
        return view('GioiThieu')->with('gt',$gt)->with('cbl',$cbl)->with('bl',$bl);
    }
    public function Comment_blog(Request $req ,$id){
        $data=array();
        $data['id_customer']=Session::get('customer_id');
        $data['id_blog']=$id;
        $data['content']=$req->comment;
        $data['date_comment']=Carbon::now('Asia/Ho_Chi_Minh');
        DB::table('comment_blog')->insert($data);
        return redirect()->back();
    }
    // public function GetComment_blog($id){
    //     $Get_CMT=DB::table('comment_blog')->where('id_blog',$id)->get();
    //     return view('DetailBlog')->with('Get_CMT',$Get_CMT);
    // }
   
}

