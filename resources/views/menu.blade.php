

            <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                <ul class="navbar-nav" id="menu">
                  
                </ul>
            </div>
            <div class="hearer_icon d-flex">

                <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                <a href=""><i class="ti-heart"></i></a>
                <a  href="/Cart"> <i class="fas fa-cart-plus"></i></a>  
                <a href="/Order-view"><i class="fas fa-user"></i></a>          
                <div style="margin-left: 15px;">
                <?php
                        $customer_id=Session::get('customer_id');
                        if($customer_id!=null){                        
                        ?>
                          <div style="cursor:pointer;"> <a href="{{URL::to('/logout-checkout')}}"><i class="fas fa-sign-out-alt">Đăng xuất</i></a></div>
                          <?php
                        }else{?>
                          <div style="cursor:pointer;"> <a href="{{URL::to('/login-checkout')}}"><i class="fas fa-sign-out-alt">Đăng nhập</i></a></div>
                          <?php
                        }?>
                      
                </div>
                <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner" action="{{URL::to('/Search')}}" method="post">
                {{csrf_field()}}
                    <input type="text" class="form-control" name="keyword_search" id="search_input" placeholder="Nhập để tìm kiếm ">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
            </div>
          
            <script>
        $(document).ready(function(){
            var url='{{route("mainmenu")}}';
            $.get(url,function(data){
                $.each(data,function(i,v){
                    $("#menu").append('<li class="nav-item dropdown"><a class="nav-link" href="'+v.link+'">'+ v.content +'</a></li>');
                });
            });
        });
        </script>
       