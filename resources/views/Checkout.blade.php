<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>aranaz</title>
  <link rel="icon" href="../img/favicon.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- animate CSS -->
  <link rel="stylesheet" href="../css/animate.css">
  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <!-- nice select CSS -->
  <link rel="stylesheet" href="../css/nice-select.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="../css/all.css">
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="../css/flaticon.css">
  <link rel="stylesheet" href="../css/themify-icons.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="../css/magnific-popup.css">
  <!-- swiper CSS -->
  <link rel="stylesheet" href="../css/slick.css">
  <link rel="stylesheet" href="../css/price_rangs.css">
  <!-- style CSS -->
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/jquery-1.12.1.min.js"></script>
</head>

<body>
  <!--::header part start::-->
  <header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="/"> <img src="img/logo.png" alt="logo"> </a>
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

  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Producta Checkout</h2>
              <p>Home <span>-</span> Shop Single</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Checkout Area =================-->
  <section class="checkout_area padding_top">
    <div class="container">
    <form class="row contact_form" action="{{URL::to('/save-checkout-customer')}}" method="post" novalidate="novalidate">
            {{csrf_field()}}
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-8">
            <h3>Thông tin gửi hàng</h3>
              @foreach($thong_tin as $r)
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="first" name="shipping_name" value="{{$r->customer_name}}" />
                <span  placeholder="Họ và tên"></span>
              </div>
              
              
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="number" name="shipping_phone"  value="{{$r->customer_phone}}" />
                <span  placeholder="Phone number"></span>
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="email" name="shipping_email"  value="{{$r->customer_email}}" />
                <span  placeholder="Email Address"></span>
              </div>
             @endforeach
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="add1" name="shipping_address" />
                <span class="placeholder" data-placeholder="Địa chỉ"></span>
              </div>
             
              
             
              
             
              
              <div class="col-md-12 form-group">
                <div class="creat_account">
                  <h3>Ghi chú đơn hàng</h3>
                  
                 
                </div>
                <textarea class="form-control" name="shipping_note" id="message" rows="1"
                  placeholder="Ghi chú đơn hàng"></textarea>
              </div>
              <!--button type="submit" style="border:none;margin-bottom: 100px;" name="" class="btn_3">Gửi</button-->
            
          </div>
          <?php
        $content=Cart::content();   
       // echo '<pre>';
       // print_r($content);
        //echo '<pre>';   
        ?>
          <div class="col-lg-6">
            <div class="order_box">
              <h2>Thông tin đặt hàng</h2>
              <ul class="list">
                <li>
                  <a href="#">Tên sản phẩm
                    <span>Tổng tiền</span>
                  </a>
                </li>
                @foreach($content as $v_content)
                <li>
                  <a href="{{route('fDetail').'/'.$v_content->id}}">{{$v_content->name}}
                    <span class="middle"> x {{$v_content->qty}}</span>
                    <span class="last">{{number_format($v_content->qty*$v_content->price)}} VNĐ</span>
                  </a>
                </li>
                @endforeach
               
              </ul>
              <ul class="list list_2">
                <li>
                  <a href="">Tạm tính
                    <span>{{Cart::subtotal()}} VNĐ</span>
                  </a>
                </li>
                <li>
                  <a href="">Phí vận chuyển
                    <span>Free</span>
                  </a>
                </li>
                <li>
                  <a href="">Thuế (VAT)
                    <span> {{Cart::tax()}} VNĐ</span>
                  </a>
                </li>
                
                <li>
                  <a href="">Tổng tiền cần thanh toán 
                    <span> {{Cart::total()}} VNĐ</span>
                  </a>
                </li>
              </ul>
              
              <div class="creat_account">
                <input type="checkbox" id="f-option4" name="selector" />
                <label for="f-option4">Tôi đã đọc và chấp nhận </label>
                <a href="#">điều khoản và điều kiện *</a>
              </div>
              <button class="btn_3"  id="tt" name="send_order"type="submit">Thanh toán khi nhận hàng</button>
            </div>
          </div>
        </div>
      </div>
     </form> 
    </div>
  </section>
  <!--================End Checkout Area =================-->

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
  <!-- jquery -->
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
  <!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
  <script>
/* $(document).ready(function() {
  $("#tt").click(function() {
    alertify.success('Bạn đã đặt hàng thành công');
  });
 });*/
  </script>

</body>

</html>