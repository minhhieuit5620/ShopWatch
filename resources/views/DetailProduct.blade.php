<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>aranoz</title>
  <link rel="icon" href="../img/favicon.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- animate CSS -->
  <link rel="stylesheet" href="../css/animate.css">
  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/lightslider.min.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="../css/all.css">
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="../css/flaticon.css">
  <link rel="stylesheet" href="../css/themify-icons.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="../css/magnific-popup.css">
  <!-- style CSS -->
  <link rel="stylesheet" href="../css/style.css">
    <!-- jquery -->
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

</head>

<body>
   <!--::header part start::-->
   <header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="/"> <img src="../img/logo.png" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    @include('menu')
                </nav>
            </div>
        </div>
    </div>
</header>
    <!-- Header part end-->

  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Chi tiết sản phẩm</h2>
              <p>Trang chủ <span>-</span> Chi tiết sản phẩm</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->
  <!--================End Home Banner Area =================-->

  <!--================Single Product Area =================-->
  <div class="product_image_area section_padding" style="padding-bottom:0px">
    <div class="container">
      <div class="row s_product_inner justify-content-between">
        <div class="col-lg-6 col-xl-6">
        <img style="width: 400px;" src="../img/dongho/{{$db->image}}" />
         
        </div>
      
          <div class="col-lg-6 col-xl-6">
              @isset($db)
              <form action="{{ URL::to('/save-cart')}}" method="post">
              {{ csrf_field() }}
            <div class="s_product_text">
              <h5>previous <span>|</span> next</h5>
              <h3>{{$db->nameProduct}}</h3>
              <h2>{{number_format($db->price,0)}} VNĐ</h2>
              <ul class="list">
                <li>
                  <a class="active" href="#">
                  
                    <span>Loại sản phẩm</span>: {{$db1->nameCategory}}</a>
                
                </li>
                <li>

                  <!-- <?php// if($db->status=1){?>
                     <a href="#"> <span>Trạng thái :Còn hàng</span> </a>
                 <?php //}else{
                   ?>
                     <a href="#"> <span>Trạng thái :Còn hàng</span> </a>
                 <?php//}?> -->
                  <a href=""> <span>Trạng thái</span> :  {{$db->status==1?"còn hàng":""}} {{$db->status==0?"hết hàng":""}} </a>
                </li>
              </ul>
              
              <div class="card_area d-flex justify-content-between align-items-center">
                <div class="product_count">
                  <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                  <input name="productid_hidden" type="hidden" value="{{ $db->id }}">
                  <input class="input-number" name="qty" type="text" value="1" min="0" max="10">
                  <span class="number-increment"> <i class="ti-plus"></i></span>
                </div>
                <button type="submit" class="btn_3">Thêm vào giỏ hàng</button>
                <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
              </div>
            </div>
            </form>
            @endisset
          </div>
       
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->

  <!--================Product Description Area =================-->
  <section class="product_description_area">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Chi tiết sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="false">Thông số kĩ thuật</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
            aria-selected="false">Bình luận</a>
        </li>
       
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
          <p>
          {!!$db->description!!}
          </p>
          
        </div>
        <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="table-responsive">
          
            <table class="table">
            @foreach($db3 as $r)
              <tbody>
                <tr>
                  <td>
                    <h5>Nhãn Hiệu</h5>
                  </td>
                  <td>
                    <h5>{{$r->NhanHieu}}</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Nguồn gốc</h5>
                  </td>
                  <td>
                    <h5>{{$r->NguonGoc}}</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Kiểu máy</h5>
                  </td>
                  <td>
                    <h5>{{$r->KieuMay}}</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Độ dày</h5>
                  </td>
                  <td>
                    <h5>{{$r->Doday}}</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Chất liệu vỏ</h5>
                  </td>
                  <td>
                    <h5>{{$r->ChatLieuVo}}</h5>
                  </td>
                </tr>
                <tr>
                <td>
                    <h5>Chất liệu dây</h5>
                  </td>
                  <td>
                    <h5>{{$r->ChatLieuDay}}</h5>
                  </td>
                </tr>
                <tr>
                <td>
                    <h5>Độ chịu nước</h5>
                  </td>
                  <td>
                    <h5>{{$r->DoChiuNuoc}}</h5>
                  </td>
                </tr>
                <tr>
                <td>
                    <h5>Giới tính </h5>
                  </td>
                  <td>
                    <h5>{{$r->GioiTinh}}</h5>
                  </td>
                </tr>
              </tbody>
            @endforeach
            </table>
          
          </div>
        </div>
        <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <div class="row">
            <div class="col-lg-6">
              <div class="comment_list">
                @foreach($get_cmt as $r)
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img src="../img/product/single-product/review-1.png" alt="" />
                    </div>
                    <div class="media-body">
                      <h4>{{$r->customer_name}}</h4>
                      <h5>{{date('d/m/Y H:i',strtotime($r->comment_date))}}</h5>
                      <a class="reply_btn" href="#">Trả lời</a>
                    </div>
                  </div>
                  <p>
                    {{$r->content}}
                  </p>
                </div>
                @endforeach            
              </div>
            </div>
            <div class="col-lg-6">
              <?php
              $customer_id=Session::get('customer_id');
              if($customer_id != null){ 
                ?>
                <div class="review_box">
                  <h4>Bình luận</h4>             
                  <div class="comment-form" style="margin-top: 0;padding-top: 0;">               
                    <form class="form-contact comment_form" action="{{URL::to('/Comment').'/'.$db->id}}" method="POST" id="commentForm">
                      {{ csrf_field() }}
                      <div class="row">
                          <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="content" id="comment" cols="30" rows="9"
                                  placeholder="Viết bình luận..."></textarea>
                            </div>
                          </div>                      
                      </div>                       
                      <button type="submit" class="btn_3 button-contactForm"> Gửi</button>                                                                  
                    </form>
                  </div>
                </div>
            </div>
            <?php
            }else{
              ?>
              <h4>Bạn chưa đăng nhập ? <br> Hãy đăng nhập để viết bình luận cho sản phẩm </h4>
              <div class="login_part_form">
                        <div class="login_part_form_iner">                           
                            <form class="row contact_form"  action="{{URL::to('/login-customer')}}" method="post" novalidate="novalidate">
                                {{csrf_field()}}
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="email_account" value=""
                                        placeholder="Username">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password_account" value=""
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Ghi nhớ đăng nhập</label>
                                    </div>
                                    <button type="submit" value="submit" class="btn_3">
                                       Đăng nhập
                                    </button>
                                    <a class="lost_pass" href="#">Quên mật khẩu ?</a>
                                </div>
                            </form>
                        </div>
                    </div>
              <?php
            }
            ?>
             
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </section>
  <!--================End Product Description Area =================-->

  <!-- product_list part start-->
  <section class="product_list best_seller">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="section_tittle text-center">
            <h2>Sản phẩm cùng loại <span>shop</span></h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center justify-content-between">
        <div class="col-lg-12">
          <div class="best_product_slider owl-carousel">
          @isset($db2)
            @foreach($db2 as $r)
            <a href="{{route('fDetail').'/'.$r->id}}">
              <div class="single_product_item">
                <img src="../img/dongho/{{$r->image}}" alt="">
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
  <footer class="footer_part">
    <div class="container">
      <div class="row justify-content-around">
        <div class="col-sm-6 col-lg-2">
          <div class="single_footer_part">
            <h4>Top Products</h4>
            <ul class="list-unstyled">
              <li><a href="">Managed Website</a></li>
              <li><a href="">Manage Reputation</a></li>
              <li><a href="">Power Tools</a></li>
              <li><a href="">Marketing Service</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2">
          <div class="single_footer_part">
            <h4>Quick Links</h4>
            <ul class="list-unstyled">
              <li><a href="">Jobs</a></li>
              <li><a href="">Brand Assets</a></li>
              <li><a href="">Investor Relations</a></li>
              <li><a href="">Terms of Service</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2">
          <div class="single_footer_part">
            <h4>Features</h4>
            <ul class="list-unstyled">
              <li><a href="">Jobs</a></li>
              <li><a href="">Brand Assets</a></li>
              <li><a href="">Investor Relations</a></li>
              <li><a href="">Terms of Service</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2">
          <div class="single_footer_part">
            <h4>Resources</h4>
            <ul class="list-unstyled">
              <li><a href="">Guides</a></li>
              <li><a href="">Research</a></li>
              <li><a href="">Experts</a></li>
              <li><a href="">Agencies</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="single_footer_part">
            <h4>Newsletter</h4>
            <p>Heaven fruitful doesn't over lesser in days. Appear creeping
            </p>
            <div id="mc_embed_signup">
              <form target="_blank"
                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                method="get" class="subscribe_form relative mail_part">
                <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                  class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                  onblur="this.placeholder = ' Email Address '">
                <button type="submit" name="submit" id="newsletter-submit"
                  class="email_icon newsletter-submit button-contactForm">subscribe</button>
                <div class="mt-10 info"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright_part">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="copyright_text">
              <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="footer_icon social_icon">
              <ul class="list-unstyled">
                <li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a></li>
                <li><a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--::footer_part end::-->

  <!-- jquery plugins here-->

  <!-- popper js -->
  <script src="../js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="../js/bootstrap.min.js"></script>
  <!-- easing js -->
  <script src="../js/jquery.magnific-popup.js"></script>
  <!-- swiper js -->
  <script src="../js/lightslider.min.js"></script>
  <!-- swiper js -->
  <script src="../js/masonry.pkgd.js"></script>
  <!-- particles js -->
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.nice-select.min.js"></script>
  <!-- slick js -->
  <script src="../js/slick.min.js"></script>
  <script src="../js/swiper.jquery.js"></script>
  <script src="../js/jquery.counterup.min.js"></script>
  <script src="../js/waypoints.min.js"></script>
  <script src="../js/contact.js"></script>
  <script src="../js/jquery.ajaxchimp.min.js"></script>
  <script src="../js/jquery.form.js"></script>
  <script src="../js/jquery.validate.min.js"></script>
  <script src="../js/mail-script.js"></script>
  <script src="../js/stellar.js"></script>
  <!-- custom js -->
  <script src="../js/theme.js"></script>
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
     <!--                          end message           -->
</body>

</html>