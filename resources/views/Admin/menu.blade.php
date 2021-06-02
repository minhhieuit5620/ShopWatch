<div class="left main-sidebar">

<div class="sidebar-inner leftscroll">

    <div id="sidebar-menu">

        <ul>
            <li class="submenu">
                <a class="active subdrop" href="/Admin">
                <span class="label radius-circle bg-danger float-right">{{$product_count}}</span>
                    <i class="fas fa-bars"></i>
                    <span> Sản phẩm </span>
                </a>
            </li>
            <li class="submenu">
                <a href="/Admin/Category">
                    <span class="label radius-circle bg-danger float-right">{{$cate_count}}</span>
                    <i class="fas fa-th"></i>
                    <span> Loại sản phẩm</span>
                </a>
            </li>
            <li class="submenu">
                <a id="tables">
               
                    <i class="fas fa-table"></i>
                    <span> Đơn hàng </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="list-unstyled">
                    <li>
                    <span class="label radius-circle bg-danger float-right">{{$order_xl_count}}</span>
                        <a href="/Admin/OrderSuccess">Đơn hàng đã xử lí</a>
                    </li>
                    <li>
                    <span class="label radius-circle bg-danger float-right">{{$order_dxl_count}}</span>
                        <a href="/Admin/Order">Đơn hàng chưa xử lí</a>
                    </li>
                </ul>
            </li>           
            <li class="submenu">
                <a href="/Admin/Blog">
                <span class="label radius-circle bg-danger float-right">{{$blog_count}}</span>
                <i class="fab fa-wpforms"></i>
                    <span> Tin tức </span>
                </a>
            </li>
            <li class="submenu">
                <a href="/Admin/Customer">
                <span class="label radius-circle bg-danger float-right">{{$customer_count}}</span>                    
                    <i class="fas fa-users"></i>
                    <span>Khách hàng</span>
                </a>
            </li>
            <li class="submenu">
                <a href="users.html">
                <span class="label radius-circle bg-danger float-right">{{$user_count}}</span>
                    <i class="fas fa-user"></i>                 
                    <span>Người dùng</span>
                </a>
            </li>

        </ul>

        <div class="clearfix"></div>

    </div>

    <div class="clearfix"></div>

</div>

</div>