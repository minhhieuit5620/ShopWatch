<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang quản trị</title>
    <meta name="description" content="Dashboard | Nura Admin">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Your website">

  
    @yield('css')
</head>

<body class="adminbody">

    <div id="main">

        <!-- top bar navigation -->
        <div class="headerbar">

            <!-- LOGO -->
            <div class="headerbar-left">
                <a href="/Admin" class="logo">
                    <!-- <img alt="Logo" src="../assets/images/logo.png" /> -->
                    <img src="/assets/images/logo.png" />
                    <span>Quản trị hệ thống</span>
                </a>
            </div>

            <nav class="navbar-custom">

                <ul class="list-inline float-right mb-0">
                


                    <li class="list-inline-item dropdown notif">
                        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                            <img src="/assets/images/avatars/admin.png" alt="Profile image" class="avatar-rounded">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow">
                                    <small>Hello, admin</small>
                                </h5>
                            </div>

                            <!-- item-->
                            <a href="/Admin/Profile" class="dropdown-item notify-item">
                                <i class="fas fa-user"></i>
                                <img src="" alt="">
                                <span>Profile</span>
                            </a>

                            <!-- item-->
                            <a href="{{URL::to('/Admin/Logout')}}" class="dropdown-item notify-item">
                                <i class="fas fa-power-off"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left">
                            <i class="fas fa-bars"></i>
                        </button>
                    </li>
                </ul>

            </nav>

        </div>
        <!-- End Navigation -->

        <!-- Left Sidebar -->
      @include('Admin.menu')
        <!-- End Sidebar -->

        <!-- <div class="content-page"> -->

            <!-- Start content -->
            <!-- <div class="content">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Chào mừng bạn đến với hệ thống quản trị  <i class="fas fa-user-lock"></i></h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Trang chủ</li>
                                    
                                </ol>
                                <div class="clearfix"></div>
                            </div>

                           
                        </div>
                    </div> -->
                    <!-- end row -->


                   
                    @yield('content')
                    <!-- </div> -->
                    <!-- end row-->

                <!-- </div> -->
                <!-- END container-fluid -->

            <!-- </div> -->
            <!-- END content -->

        <!-- </div> -->
        <!-- END content-page -->

        <footer class="footer">
            <span class="text-right">                
                Copyright <a target="_blank" href="#">Company</a>
            </span>
            <span class="float-right">
                <!-- Copyright footer link MUST remain intact if you download free version. -->
                <!-- You can delete the links only if you purchased the pro or extended version. -->
                <!-- Purchase the pro or extended version with PHP version of this template: https://bootstrap24.com/template/nura-admin-4-free-bootstrap-admin-template -->
                Powered by <a target="_blank" href="https://bootstrap24.com" title="Download free Bootstrap templates"><b>Bootstrap24.com</b></a>
            </span>
        </footer>

        

    </div>
    @yield('js')
   

</body>

</html>