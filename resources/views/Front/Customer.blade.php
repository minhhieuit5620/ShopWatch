<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>aranoz</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/price_rangs.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>

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
                        <a class="navbar-brand" href="/"> <img src="img/logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        @include('./Front/menu')
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
                            <h2>Tài khoản</h2>
                            <p>Trang chủ <span>-</span>Tài khoản</p>
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
                            @foreach($thong_tin as $r)
                           
                                <h3> <i class="fas fa-user"></i>  {{$r->customer_name}} </h3>
                                @endforeach
                            </div>
                            <div class="widgets_inner l_w_title">
                                <ul class="list">
                                
                                    <li>
                                        
                                        <a href="/Customer"><i class="far fa-address-card"></i> Thông tin tài khoản</a>

                                    </li>
                                </ul>
                                <ul class="list">
                                    <li>
                                        <a href="/Order-view"><i class="far fa-calendar-alt"></i> Đơn hàng của bạn</a>

                                    </li>
                                </ul>
                                <ul class="list">
                                    <li>
                                        <a href=""><i class="fas fa-heart"></i> Sản phẩm yêu thích</a>

                                    </li>
                                </ul>
                            </div>
                        </aside>

                     
                      
                    </div>
                </div>
                <div class="col-lg-9">
                    
                    <h3 class="text-center">Tài khoản của bạn</h3>
                    <!-- hiển thị thông báo -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- end thông báo -->
                    <br>
                    @foreach($thong_tin as $r)
                    <form action="{{URL::to('/EditCustomer/'.$r->customer_id)}}" method="post">
                    {{csrf_field()}}
                        
                        <div class="form-group">
                        <label for="">Họ tên</label>
                        <input type="text" name="txtname" id="" value="{{$r->customer_name}}" class="form-control" placeholder="Nhập họ tên của bạn" aria-describedby="helpId">
                        
                        </div>
                        <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="txtphone" id="" value="{{$r->customer_phone}}" class="form-control" placeholder="Nhập SĐT để trải nghiệm tốt hơn" aria-describedby="helpId">
                        
                        </div>
                        <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="txtemail" id="" value="{{$r->customer_email}}" class="form-control" placeholder="Email của bạn" aria-describedby="helpId">
                        
                        </div>
                        <div class="form-group">
                          <input type="checkbox" name="checkpassword" id="changePassWord">
                          <label for="">Đổi mật khẩu</label>
                          <input type="password" name="password" id="" class="form-control password" placeholder="" aria-describedby="helpId" disabled>                         
                        </div>
                        <div class="form-group">
                          <label for="">Nhập lại mật khẩu</label>
                          <input type="password" name="passwordAgain" id="" class="form-control password" placeholder="" aria-describedby="helpId" disabled>                        
                        </div>
                        <button type="submit" class=" btn btn-danger"> Cập nhật </button>
                      
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

    <!-- product_list part start-->
  
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


    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/stellar.js"></script>
    <script src="js/price_rangs.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>

    <!-- Thay đổi mật khẩu -->
    <script>
    $(document).ready(function(){
        $("#changePassWord").change(function(){
            if($(this).is(":checked")){
                $(".password").removeAttr('disabled');
            }
            else{
                $(".password").attr('disabled','');
            }
        });
    });
    
    </script>

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