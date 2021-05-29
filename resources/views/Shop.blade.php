@extends('Layout')

@section('content')
    <!-- Header part end-->

    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Cửa hàng</h2>
                            <p>Trang chủ <span>-</span> Cửa hàng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Loại sản phẩm</h3>
                            </div>
                            <div class="widgets_inner">
                                @foreach($ct as $key=>$cate)
                                <ul class="list">
                                    <li>
                                        <a href="{{URL::to('/ProductCate/'.$cate->id)}}">{{$cate->nameCategory}}</a>
                                        <span>(250)</span>
                                    </li>
                                   
                                </ul>
                                @endforeach
                            </div>
                        </aside>

                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Thương hiệu</h3>
                            </div>
                            <div class="widgets_inner">
                            @foreach($th as $r)
                                <ul class="list">
                                    <li>
                                        <a href="{{URL::to('/ProductCate/'.$cate->id)}}">{{$r->name}}</a>
                                    </li>
                                   
                                </ul>
                            @endforeach
                              
                            </div>
                        </aside>

                       
                      
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu">
                                    <p><span>10000 </span> Prodict Found</p>
                                </div>
                                <div class="single_product_menu d-flex">
                                    <h5>short by : </h5>
                                    <select>
                                        <option data-display="Select">name</option>
                                        <option value="1">price</option>
                                        <option value="2">product</option>
                                    </select>
                                </div>
                                <div class="single_product_menu d-flex">
                                    <h5>show :</h5>
                                    <div class="top_pageniation">
                                        <ul>
                                            <li>1</li>
                                            <li>2</li>
                                            <li>3</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single_product_menu d-flex">
                               
                                    <form action="{{URL::to('/Search')}}" method="post">
                                    {{csrf_field()}}
                                        <div class="input-group">
                                            <input type="text" name="keyword_search"  class="form-control" placeholder="search"
                                                aria-describedby="inputGroupPrepend">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend"><i
                                                        class="ti-search"></i></span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center latest_product_inner">
                      
                        @isset($db)
                            @foreach($db as $r)
                            <a href="{{route('fDetail').'/'.$r->id}}">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="/img/dongho/{{$r->image}}" alt="">
                                        <div class="single_product_text">
                                            <h4>{{$r->nameProduct}}</h4>
                                            <h3>{{number_format($r->price,0)}} VNĐ</h3>
                                            <a href="#" class="add_cart">+ add to cart
                                            <i class="ti-heart" id="{{$r->id}}" onclick="add_wistlist(this.id);"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            
                            @endforeach
                        @endisset
                        <div style="margin-left:350px;"> {!! $db->appends(['trang'=>'shop'])->links() !!}</div>                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

    <!-- product_list part start-->
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
    <!-- product_list part end-->

    <!--::footer_part start::-->
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