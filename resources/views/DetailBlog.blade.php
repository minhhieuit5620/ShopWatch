<!doctype html>
<html lang="zxx">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>aranoz</title>
   <link rel="icon" href="img/favicon.png">
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
</head>

<body>
<style>
p{
   font-family: Arial, Helvetica, sans-serif;
}
strong{
   font-family: Arial, Helvetica, sans-serif;
}
</style>
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

   <!--================Home Banner Area =================-->
   <!-- breadcrumb start-->
   <section class="breadcrumb breadcrumb_bg">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-8">
               <div class="breadcrumb_iner">
                  <div class="breadcrumb_iner_item">
                     <h2>Chi tiết tin tức</h2>
                     <p>Trang chủ <span>-</span> Chi tiết tin tức</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- breadcrumb start-->
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area padding_top">
      <div class="container">
         <div class="row">
         <?php
        ?>
        
            <div class="col-lg-8 posts-list">
               @foreach($debl as $r)
                  <div class="single-post">
                     
                     <div class="blog_details">
                        <h2>{{$r->nameBlog}}
                        </h2>
                        <div class="feature-img">
                        <img class="img-fluid" src="../img/blog/{{$r->image}}" alt="">
                     </div>
                        <!-- <ul class="blog-info-link mt-3 mb-4">
                           <li><a href="#"><i class="far fa-user"></i> Travel, Lifestyle</a></li>
                           <li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li>
                        </ul> -->
                        <p class="excert">
                           {!!$r->description!!}
                        </p>
                     
                     </div>
                  </div>
               @endforeach   
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                     <p class="like-info"><span class="align-middle"><i class="far fa-heart"></i></span> Lily and 4
                        people like this</p>
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        <!-- <p class="comment-count"><span class="align-middle"><i class="far fa-comment"></i></span> 06 Comments</p> -->
                     </div>
                     <ul class="social-icons">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                     </ul>
                  </div>
                  <!-- <div class="navigation-area">
                     <div class="row">
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                           <div class="thumb">
                              <a href="#">
                                 <img class="img-fluid" src="../img/post/preview.png" alt="">
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="#">
                                 <span class="lnr text-white ti-arrow-left"></span>
                              </a>
                           </div>
                           <div class="detials">
                              <p>Prev Post</p>
                              <a href="#">
                                 <h4>Space The Final Frontier</h4>
                              </a>
                           </div>
                        </div>
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                           <div class="detials">
                              <p>Next Post</p>
                              <a href="#">
                                 <h4>Telescopes 101</h4>
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="#">
                                 <span class="lnr text-white ti-arrow-right"></span>
                              </a>
                           </div>
                           <div class="thumb">
                              <a href="#">
                                 <img class="img-fluid" src="../img/post/next.png" alt="">
                              </a>
                           </div>
                        </div>
                     </div>
                  </div> -->
               </div>
               <div class="blog-author">
                  <div class="media align-items-center">
                     <img src="../img/blog/author.png" alt="">
                     <div class="media-body">
                        <a href="#">
                           <h4>Tên </h4>
                        </a>
                        <p>Bài viết của Hứa Minh Hiếu</p>
                     </div>
                  </div>
               </div>
               <div class="comments-area">
                  <h4>05 Comments</h4>
                  @foreach($Get_CMT as $r)
                     <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                           <div class="user justify-content-between d-flex">
                              <div class="thumb">
                                 <img src="img/comment/comment_3.png" alt="">
                              </div>
                              <div class="desc">
                                 <p class="comment">
                                 {{$r->content}}
                                 </p>
                                 <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                       <h5>
                                          <a href="#">{{$r->customer_name}}</a>
                                       </h5>
                                       <p class="date">{{date('d/m/Y H:i',strtotime($r->date_comment))}} </p>
                                    </div>
                                    <div class="reply-btn">
                                       <a href="#" class="btn-reply text-uppercase">Trả lời</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  @endforeach
               </div>
               @foreach($debl as $r)
               <div class="comment-form">
                  <h4>Bình luận</h4>
                  <form class="form-contact comment_form" action="{{URL::to('/Cmt-Blog/'.$r->id)}}" method="Post" id="commentForm">
                     {{csrf_field()}}
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                 placeholder="Viết bình luận của bạn ....."></textarea>
                           </div>
                        </div>
                                           
                     </div>
                     <div class="form-group mt-3">
                     <button type="submit" class="btn_3 button-contactForm">
                        Bình luận
                     </button>
                        <!-- <a href="#" class="btn_3 button-contactForm">Send Message</a> -->
                     </div>
                  </form>
               </div>
               @endforeach
            </div>
       
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget search_widget">
                     <form action="#">
                        <div class="form-group">
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder='Search Keyword'
                                 onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                              <div class="input-group-append">
                                 <button class="btn" type="button"><i class="ti-search"></i></button>
                              </div>
                           </div>
                        </div>
                        <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">Search</button>
                     </form>
                  </aside>
                  <aside class="single_sidebar_widget post_category_widget">
                     <h4 class="widget_title">Tin tức</h4>
                     <ul class="list cat-list">
                       
                        @foreach($cbl as $r)
                            <ul class="list cat-list">
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>{{$r->nameCate}}</p>
                                        <p>(37)</p>
                                    </a>
                                </li>
                               
                            </ul>
                            @endforeach
                     </ul>
                  </aside>
                  <aside class="single_sidebar_widget popular_post_widget">
                  <h3 class="widget_title">Tin tức nổi bật</h3>
                            @foreach($bl as $r)
                            <div class="media post_item">
                                <img style="width:100px;" src="../img/blog/{{$r->image}}" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>{{$r->nameBlog}}</h3>
                                    </a>
                                    <p>January 12, 2019</p>
                                </div>
                            </div>
                           @endforeach
                  </aside>
                  <aside class="single_sidebar_widget popular_post_widget">
                  <h3 class="widget_title">Các bài đăng gần đây</h3>
                            @foreach($bl as $r)
                            <div class="media post_item">
                                <img style="width:100px;" src="../img/blog/{{$r->image}}" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>{{$r->nameBlog}}</h3>
                                    </a>
                                    <p>January 12, 2019</p>
                                </div>
                            </div>
                           @endforeach
                  </aside>
                  <?php
                        $customer_id=Session::get('customer_id');
                        if($customer_id==null){
                            ?>
                            

                       
                        <aside class="single_sidebar_widget newsletter_widget">
                       
                            <!-- <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                        type="submit"><a href=""> Đăng nhập</a></button>
                                    <h4 class="text-center">hoặc</h4>
                                     <h4 class="widget_title">hoặc</h4>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                        type="submit"><a href="">Đăng kí</a> </button> -->
                            <form class="row contact_form"  action="{{URL::to('/login-customer')}}" method="post" novalidate="novalidate">
                                {{csrf_field()}}
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control"  name="email_account" value=""
                                        placeholder="Username">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password_account" value=""
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">                                  
                                    <button type="submit" value="submit" class="button rounded-0 primary-bg text-white w-100 btn_3">
                                       Đăng nhập
                                    </button>                                  
                                </div>
                            </form> 
                            <h4 class="text-center">hoặc</h4>   
                            <a href="/Sign-up" style="color:#fff !important;">
                            <button class="button rounded-0 primary-bg text-white w-100 btn_3" type="submit">
                               
                                Đăng kí
                                                       
                                </button>    
                                </a>       
                           
                        </aside>    
                        <?php
                        }                        
                        ?>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================Blog Area end =================-->

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
   <!-- easing js -->
   <script src="../js/jquery.magnific-popup.js"></script>
   <!-- swiper js -->
   <script src="../js/swiper.min.js"></script>
   <!-- swiper js -->
   <script src="../js/masonry.pkgd.js"></script>
   <!-- particles js -->
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
   <!-- custom js -->
   <script src="../js/custom.js"></script>
</body>

</html>