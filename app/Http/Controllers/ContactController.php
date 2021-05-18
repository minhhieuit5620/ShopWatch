<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use DB;
use Session;
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
        return view('DetailBlog')->with('debl',$debl)->with('bl',$bl)->with('cbl',$cbl);
        //return view('DetailBlog');
        //} 
         
    }
    public function gioithieu(){
        $gt=DB::table('gioithieu')->get();
        $bl=DB::table('blog')->orderby('id','asc')->get();
        $cbl=DB::table('cateblog')->orderby('idcate','desc')->get();
        return view('GioiThieu')->with('gt',$gt)->with('cbl',$cbl)->with('bl',$bl);
    }
}

