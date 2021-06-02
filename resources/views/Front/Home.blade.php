@extends('Layout.LayoutFront')

@section('slide')
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_slider owl-carousel">
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Hãy chọn phong cách hoàn hảo của bạn</h1>
                                            <p>Phong cách nói lên sự đẳng cấp của bạn</p>
                                            <a href="/Shop" class="btn_2">Mua sắm ngay</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="img/slide/donghonam-10-20trieu-Citizen-NJ0090-21L-53-removebg-preview.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                        <h1>Hãy chọn phong cách hoàn hảo của bạn</h1>
                                            <p>Phong cách nói lên sự đẳng cấp của bạn</p>
                                            <a href="/Shop" class="btn_2">Mua sắm ngay</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="img/slide/new_product2-removebg-preview.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                        <h1>Hãy chọn phong cách hoàn hảo của bạn</h1>
                                            <p>Phong cách nói lên sự đẳng cấp của bạn</p>
                                            <a href="/Shop" class="btn_2">Mua sắm ngay</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="img/slide/new_product2-removebg-preview.png" alt="">
                                </div>
                            </div>
                        </div>                       
                    </div>
                    <div class="slider-counter"></div>
                </div>
        </div>
    </div>
</section>
@endsection
@section('content')
<section class="feature_part padding_top">
    <div class="container">           
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section_tittle text-center">
                    <h2>Thương hiệu nổi tiếng</h2>
                </div>
            </div>
        </div>      
        <div class="row align-items-center justify-content-between">      
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
        </div>
    </div>
</section>
<!-- Danh sách sản phẩm -->
<section class="product_list section_padding">
    <div class="container">           
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
                                            <!-- <a href="{{url('Cart'.'/'.$r->id)}}" class="add_cart">+ add to cart<i class="ti-heart"></i></a> -->
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
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <a href="{{route('fDetail').'/'.$r->id}}">
                                    <img src="/img/dongho/{{$r->image}}" alt="">
                                        <div class="single_product_text">
                                            <h4>{{$r->nameProduct}}</h4>
                                            <h3>{{number_format($r->price,0)}} VNĐ</h3>
                                            <!-- <a href="{{url('Cart'.'/'.$r->id)}}" class="add_cart">+ add to cart<i class="ti-heart"></i></a> -->
                                        </div>
                                    </a>
                                
                                </div>
                            </div>
                            <!-- <a href="{{route('fDetail').'/'.$r->id}}">
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
                            </a>             -->
                            @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>             
    </div>
</section>    
<!-- sản phẩm bản chạy -->
<section class="product_list best_seller">
    <div class="container">
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
    </div>
</section>            
@endsection
@section('trademark')
<section class="client_logo padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                @foreach($trademark as $r)
                <div class="single_client_logo" style="padding: 20px;" >
                    <img  src="img/Thuonghieu/{{$r->image}}" alt="">
                </div>
            @endforeach
            </div>
        </div>
     </div>
</section>        
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