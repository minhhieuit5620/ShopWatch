@extends('Layout')

@section('category')
 <div class="row justify-content-center">
     <div class="col-lg-8">
         <div class="section_tittle text-center">
             <h2>Thương hiệu nổi tiếng</h2>
         </div>
     </div>
 </div>
 <div class="row align-items-center justify-content-between">
 @isset($db)
     @foreach($ct as $r)
     <div class="col-lg-6 col-sm-6">
         <div class="single_feature_post_text">
             <!--p>Premium Quality</p-->
             <h3>{{$r->nameCategory}}</h3>
             <a href="{{URL::to('/ProductCate/'.$r->id)}}" class="feature_btn">Đi đến của hàng <i class="fas fa-play"></i></a>
             <img src="img/slide/{{$r->image}}" alt="">
         </div>
     </div>      
     @endforeach
 @endisset  
 </div>
@endsection    
@section('product')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="section_tittle text-center">
            <h2>Nổi bật <span>shop</span></h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="product_list_slider owl-carousel">
            <div class="single_product_list_slider">
                <div class="row align-items-center justify-content-between">
                    @isset($db)
                    @foreach($db as $r)
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_product_item">
                            <a href="{{route('fDetail').'/'.$r->id}}">
                            <img src="/img/dongho/{{$r->image}}" alt="">
                                <div class="single_product_text">
                                    <h4>{{$r->nameProduct}}</h4>
                                    <h3>{{number_format($r->price,0)}} VNĐ</h3>
                                    <a href="{{url('Cart'.'/'.$r->id)}}" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                </div>
                            </a>
                        
                        </div>
                    </div>
                    @endforeach
                    @endisset
                </div>
            </div>
            <div class="single_product_list_slider">
                <div class="row align-items-center justify-content-between">
                    @isset($db)
                    @foreach($db as $r)
                    <a href="{{route('fDetail').'/'.$r->id}}">
                        <div class="col-lg-3 col-sm-6">
                            <div class="single_product_item">
                                <img src="/img/dongho/{{$r->image}}" alt="">
                                <div class="single_product_text">
                                    <h4>{{$r->nameProduct}}</h4>
                                    <h3>{{number_format($r->price,0)}} VNĐ</h3>
                                    <a href="{{url('addcart'.'/'.$r->id)}}" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </a>            
                    @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('bestsaller')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="section_tittle text-center">
                <h2>Sản phẩm bán chạy <span>shop</span></h2>
            </div>
        </div>
    </div>
    <div class="row align-items-center justify-content-between">
        <div class="col-lg-12">
            <div class="best_product_slider owl-carousel">
            @isset($db)
                @foreach($db as $r)
                <a href="{{route('fDetail').'/'.$r->id}}">
                    <div class="single_product_item">
                        <img src="img/dongho/{{$r->image}}" alt="">
                        <div class="single_product_text">
                            <h4>{{$r->nameProduct}}</h4>
                            <h3>{{number_format($r->price,0)}} VNĐ</h3>
                        </div>
                    </div>
                </a>
            
                @endforeach
            @endisset
            </div>
        </div>
    </div>
                
@endsection
@section('trademark')
    <div class="row align-items-center">
        <div class="col-lg-12">
            @foreach($trademark as $r)
            <div class="single_client_logo" style="padding: 20px;" >
                <img  src="img/Thuonghieu/{{$r->image}}" alt="">
            </div>
           @endforeach
        </div>
    </div>
@endsection
@section('footer')
<div class="row justify-content-around">
                <div class="col-sm-6 col-lg-3">
                    <div class="single_footer_part">
                        <h4>Sản phẩm hàng đầu</h4>
                        <ul class="list-unstyled">
                        @foreach($lsp as $r)
                            <li><a href="{{URL::to('/ProductCate/'.$r->id)}}">{{$r->nameCategory}}</a></li>
                            
                        @endforeach    
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_footer_part">
                        <h4>Thương hiệu nổi tiếng</h4>
                        <ul class="list-unstyled">
                        @foreach($th as $r)
                            <li><a href="">{{$r->name}}</a></li>
                            
                        @endforeach  
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_footer_part">
                        <h4>Tính năng</h4>
                        <ul class="list-unstyled">
                        @foreach($menu as $r)
                            <li><a href="{{$r->link}}">{{$r->content}}</a></li>
                            
                        @endforeach  
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_footer_part">
                        <h4>Tin tức</h4>
                        <ul class="list-unstyled">
                        @foreach($tt as $r)
                        <li>
                        <!--img src="img/blog/{{$r->image}}" style="width:50px;" alt=""--></li>
                            <li>
                            
                            <a href="{{URL::to('/DetailBlog/'.$r->id)}}">{{$r->nameBlog}}</a></li>
                            
                        @endforeach  
                        </ul>
                    </div>
                </div>
               
            </div>
@endsection