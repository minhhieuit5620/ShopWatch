<?php
/*
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;
    public $product=null;
    public $totalPrice=0;
    public $totalQuanty=0;

    public function constrant($cart){
        if($cart){
            $this->product=$cart->product;
            $this->totalPrice=$cart->totalPrice;
            $this->totalQuanty=$cart->totalQuanty;

        }
    }
    public function Addcart($product,$id){
        $newProduct==['quantity'=>1,'nameProduct'=>$product];
        if($this->product){
            if(array_key_exists($id,$product)){
                $newProduct=$product[$id];
            }
        }
        $newProduct['quantity']++;
        $newProduct['price']=$newProduct['quantity']*$product->price;
        $this->product[$id]=new $product;
        $this->totalPrice+=$product->price;
        $this->totalQuanty++;
    }
}
*/