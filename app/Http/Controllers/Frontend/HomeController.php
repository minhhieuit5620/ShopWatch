<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\ProductModel;
use  App\Models\CategoryModel;
use  App\Models\MenuModel;
use  App\Models\xedapmodel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use Carbon\Carbon;
use Cart;
session_start();
class HomeController extends Controller
{
    public function index(){
       
        $db=ProductModel::take(8)->get();
        $ct=CategoryModel::take(4)->get();
        //footer
        $lsp=DB::table('category')->orderby('id','asc')->get();//->take(4)
        $th=DB::table('trademark')->orderby('id','asc')->take(4)->get();
        $menu=DB::table('menu')->orderby('id','asc')->get();
        $tt=DB::table('blog')->orderby('id','asc')->get();
        $trademark=DB::table('trademark')->orderby('id','asc')->take(10)->get();
        return view('Front.Home',['db'=>$db,'ct'=>$ct])->with('lsp',$lsp)->with('th',$th)->with('menu',$menu)->with('tt',$tt)->with('trademark',$trademark);
        //return view('Home',['db'=>$db,'ct'=>$ct]);
    }
    /*public function getCategory(){
        $ct=CategoryModel::all();
        return view('getCategory',['ct'=>$ct]);
        //return CategoryModel::all();
    }*/
    public function getAllloaixe(){
        // $db1=LoaixeModel::all();
         //return view('getAllloaixe',['db1'=>$db1]);
         return xedapmodel::all();
     }
    public function menu(){
       // $menu=MenuModel::all();
        //return view('menu',['menu'=>$menu]);
        return MenuModel::all();
    }
    public function shop(){
        $data['db']=ProductModel::paginate(9);
        //$db=ProductModel::all();
        //$ct=CategoryModel::take(10)->get();
        $ct=DB::table('category')->orderby('id','asc')->get();
        $th=DB::table('trademark')->orderby('id','asc')->TAKE(5)->get();

        $lsp=DB::table('category')->orderby('id','asc')->get();//->take(4)       
        $menu=DB::table('menu')->orderby('id','asc')->get();
        $tt=DB::table('blog')->orderby('id','asc')->get();
       
        return view('Front.Shop',$data)->with('ct',$ct)
        ->with('th',$th)->with('menu',$menu)->with('tt',$tt)->with('lsp',$lsp);
    }
    public function ProductCate($id=null){
        $prc=DB::table('product')->where('idcategory',$id)->get();
        $lsp=DB::table('category')->orderby('id','asc')->get();//->take(4)
        $th=DB::table('trademark')->orderby('id','asc')->take(4)->get();
        $menu=DB::table('menu')->orderby('id','asc')->get();
        $tt=DB::table('blog')->orderby('id','asc')->get();
        return view('Front.ProductCate',)->with('prc',$prc)->with('lsp',$lsp)->with('th',$th)->with('menu',$menu)->with('tt',$tt);
    }
    
    public function Search(Request $req){
        $keyword=$req->keyword_search;
        $search_pro=DB::table('product')->where('nameProduct','like','%'.$keyword.'%')->get();
        if($keyword==null){
            
            return Redirect::to('/');
        }else{
           
            return view('Front.Search')->with('search_pro',$search_pro);
        }
        
    }
    public function phukien(){
        $phukien=DB::table('product')->where('idcategory','=','5')->get();
        return view('Front.PhuKien')->with('phukien',$phukien);
    }
    
    public function footer(){
        $lsp=DB::table('category')->orderby('id','asc')->get();//->take(4)
        $th=DB::table('trademark')->orderby('id','asc')->take(4)->get();
        $menu=DB::table('menu')->orderby('id','asc')->get();
        $tt=DB::table('blog')->orderby('id','asc')->get();
        return view('Home')->with('lsp',$lsp)->with('th',$th)->with('menu',$menu)->with('tt',$tt);
    }
}
