@extends('Layout.LayoutFront')
@section('css')
    <link rel="icon" href="../img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="../css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="../css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="../css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-1.12.1.min.js"></script>
     <!--                        thông báo - sử dụng toastr             -->
     <!-- link css toastr -->
     <link rel="stylesheet" href="https://codeseven.github.io/toastr/build/toastr.min.css">
     @if(session('toastr'))
         <script>
          var type_message = "{{session('toastr.type')}}";
          var message= "{{session('toastr.message')}}";
         </script>     
     @endif
@endsection
@section('content')

    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Cửa hàng loại</h2>
                            <p>Trang chủ <span>-</span> Cửa hàng loại</p>
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
                
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            
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
                        @foreach($prc as $r)
                            <a href="{{route('fDetail').'/'.$r->id}}">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="../img/dongho/{{$r->image}}" alt="">
                                        <div class="single_product_text">
                                            <h4>{{$r->nameProduct}}</h4>
                                            <h3>{{number_format($r->price,0)}} VNĐ</h3>
                                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

    <!-- product_list part start-->
   
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
    <script src="../js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="../js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- easing j../s -->
    <script src="../js/jquery.magnific-popup.js"></script>
    <!-- swiper j../s -->
    <script src="../js/swiper.min.js"></script>
    <!-- swiper j../s -->
    <script src="../js/masonry.pkgd.js"></script>
    <!-- particle../s js -->
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="../js/slick.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/contact.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/jquery.form.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/mail-script.js"></script>
    <script src="../js/stellar.js"></script>
    <script src="../js/price_rangs.js"></script>
    <!-- custom js -->
    <script src="../js/custom.js"></script>
    <!--                         Thông báo               -->
    <!-- link js toastr -->
    <script src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>
     <script>
        if(typeof type_message != "undefined")
        {
            switch (type_message){
                case 'success':
                 toastr.success(message)
                 break;
                 case 'error':
                 toastr.error(message)
                 break;
            }

        }
    
     </script>           
</div>
@endsection