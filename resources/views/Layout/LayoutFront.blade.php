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
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
     <!-- jquery plugins here-->
     <script src="js/jquery-1.12.1.min.js"></script>
    @yield('css')

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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="menu_icon"><i class="fas fa-bars"></i></span>
            </button>
            @include('./Front/menu')
        </nav>
   
        
    </header>
    <!-- Header part end-->

    <!-- banner part start-->
    @yield('slide')
   
    <!-- banner part start-->

    <!-- feature_part start-->
   
           
               @yield('content')
       
    
    <!-- subscribe_area part start-->
    <section class="subscribe_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="subscribe_area_text text-center">
                        <h5>THAM GIA CỘNG ĐỒNG CỦA CHÚNG TÔI</h5>
                        <h2>Đăng ký để được Cập nhật với các ưu đãi mới</h2>
                        <div class="input-group">
                            <!-- <input type="text" class="form-control" placeholder="enter email address" aria-label="Recipient's username" aria-describedby="basic-addon2"> -->
                            <div class="input-group-append">
                                <a href="/Sign-up" class="input-group-text btn_2" id="basic-addon2">ĐĂNG KÍ NGAY BÂY GIỜ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::subscribe_area part end::-->

    <!-- subscribe_area part start-->
    
            @yield('trademark')
       
    <!--::subscribe_area part end::-->

    <!--::footer_part start::-->
    <footer class="footer_part">
   
        <div class="container">
        @yield('footer')
        </div>
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <P>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> Bản quyền thuộc   <a href="https://www.facebook.com/minhhieu562k/" target="_blank">MinhHieu</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </P>
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
    <!-- custom js -->
    <script src="js/custom.js"></script>

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