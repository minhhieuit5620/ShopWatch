<?php

namespace App;
class Cart{
    public $products=null;
    public $totalPrice=0;
    public $totalQuanty=0;

    public function constrant($cart){
        if($cart){
            $this->products=$cart->products;
            $this->totalPrice=$cart->totalPrice;
            $this->totalQuanty=$cart->totalQuanty;

        }
    }
    public function Addcart($product,$id){
        $newProduct=['quantity'=>0,'price'=>$product->price,'product'=>$product];
        if($this->products){
            if(array_key_exists($id,$products)){
                $newProduct=$product[$id];
            }
        }
        $newProduct['quantity']++;
        $newProduct['price']=$newProduct['quantity']*$product->price;
        
        $this->products[$id]=new $product;
        $this->totalPrice+=$product->price;
        $this->totalQuanty++;
    }

}?>