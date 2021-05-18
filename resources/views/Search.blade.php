@extends('Layout')

@section('category')
<div class="section_tittle">
    <h2> Kết quả tìm kiếm</h2>
    </div>

    <div class="row align-items-center latest_product_inner">
    @foreach($search_pro as $r)

   
        <div class="col-lg-3 col-sm-6">
            <a href="{{route('fDetail').'/'.$r->id}}">
                <div class="single_product_item">
                    <img src="/img/dongho/{{$r->image}}" alt="">
                    <div class="single_product_text">
                        <h4>{{$r->nameProduct}}</h4>
                        <h3>{{number_format($r->price,0)}} VNĐ</h3>
                        <a href="{{url('addcart'.'/'.$r->id)}}" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                    </div>
                </div>
            </a> 
        </div>
          
    @endforeach
    </div> 
@endsection    