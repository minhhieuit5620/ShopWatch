<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\ProductModel;
use  App\Models\CategoryModel;
use  App\Models\MenuModel;
use  App\Models\ProductInfoModel;
class ProductDetailController extends Controller
{
    public function ctsp($id=null,$prID=null){
        if($id!=null){
            $db=ProductModel::find($id);
            $db1=CategoryModel::find($db->idcategory);
            $db2=ProductModel::where('idcategory','=',$db->idcategory)->get();
           // if($prID==$id)
                $db3=ProductInfoModel::where('ProductID',$prID)->get();

            
           
           // $db3=ProductInfoModel::find($db->$id);
           // $db4=ProductModel::where('ProductID','=',$db->ProductID)->get();
            //$db4=ProductInfoModel::where('ProductID',$id)->get();
            return view('DetailProduct',['db'=>$db,'db1'=>$db1,'db2'=>$db2,'db3'=>$db3]);
        }
    }
    

    
}
