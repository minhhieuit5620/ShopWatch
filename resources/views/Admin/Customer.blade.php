@extends('Layout.LayoutAdmin')
@section('css')
  <!-- Favicon -->
  <link rel="shortcut icon" href="../assets/images/favicon.ico">

<!-- Bootstrap CSS -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<!-- Font Awesome CSS -->
<link href="../assets/font-awesome/css/all.css" rel="stylesheet" type="text/css" />

<!-- Custom CSS -->
<link href="../assets/css/style.css" rel="stylesheet" type="text/css" />

<!-- BEGIN CSS for this page -->
<link rel="stylesheet" type="text/css" href="../assets/plugins/chart.js/Chart.min.css" />
<link rel="stylesheet" type="text/css" href="../assets/plugins/datatables/datatables.min.css" />
<!-- END CSS for this page -->
@endsection
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left" _msthash="1387295" _msttexthash="1575912">Quản lí khách hàng</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item" _msthash="1710098" _msttexthash="47034">Trang chủ</li>
                            <li class="breadcrumb-item active" _msthash="1710826" _msttexthash="1575912">Khách hàng</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3>
                            <i class="fas fa-users"></i><font _mstmutation="1" _msthash="1743274" _msttexthash="1575912"> Khách hàng</font></h3>
                        </div>
                        <div class="card-body" _msthash="1499953" _msttexthash="2568748">
                        <h1 class="text-center">Danh sách khách hàng</h1>                        
                        
                        <form style="float:right;" >
                        <input type="text" placeholder="Search..." name="search" value="{{\Request::get('search')}}" >
                        <button><i class="fas fa-search"></i></button>   
                        </form>   
                                     
                        <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="min-width:750px">Thông tin khách hàng</th>
                                                    <!-- <th style="width:120px">Reset pass</th> -->
                                                    <th style="min-width:110px; text-align:center">Thao tác</th>
                                                </tr>
                                            </thead>
                                            @foreach($getCus as $r)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="user_avatar_list d-none d-none d-lg-block" style="margin-bottom: 15px;"><img alt="image" src="../assets/images/avatars/avatar_small.png"></div>
                                                        <h4> {{$r->customer_name}}</h4>
                                                        <p>Địa chỉ Email : {{$r->customer_email}}</p>
                                                        <p>Số điện thoại : {{$r->customer_phone}} </p>
                                                        
                                                    </td>
                                                  
                                                    <td>
                                                        <a href="{{route('detailCus').'/'.$r->customer_id}}" class="btn btn-primary  mt-4 ml-4 ">
                                                        <i class="fas fa-search"></i> Xem</a>
                                                        <a href="{{route('resetPass').'/'.$r->customer_id}}" class="btn btn-primary  mt-4 ">
                                                        <i class="far fa-edit"></i> Reset mật khẩu</a>
                                                        <!-- <a href="#" class="btn btn-primary btn-sm btn-block"><i class="far fa-edit"></i> Edit</a> -->
                                                        <a name="" onclick="return confirm('Bạn chắc chắn muốn xoá khách hàng {{$r->customer_id}}')" 
                                                        id="" class="btn btn-danger mt-4 " href="{{route('removeCus').'/'.$r->customer_id}}" role="button">
                                                        <i class="fas fa-trash"></i> Xoá </a>
                                                        <!-- <a href="#" class="btn btn-danger btn-sm btn-block mt-2"><i class="fas fa-trash"></i> Delete</a> -->
                                                    </td>
                                                </tr>

                                               
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                        <!--p><a href="{{route('productaddnew')}}" class="btn btn-info">Add new</a></p-->
                        <!-- <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã khách hàng</th>
                                    
                                  
                                    <th>Tên khách hàng</th>
                                    <th>Email</th> 
                                    <th>Điện thoại</th>     
                                    <td>Xem</td>
                                    <td>Xóa</td>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $TT=1;
                            @endphp
                          
                            @foreach($getCus as $r)
                                <tr>
                                    <td>{{$TT++}}</td>
                                    <td>{{$r->customer_id}}</td>
                                    <td>{{$r->customer_name}}</td>
                                    
                                    <td>{{$r->customer_email}} </td>
                                    <td>{{$r->customer_phone}} </td>
                                    <td>
                                    <a data-id="" href="{{route('EditCate').'/'.$r->customer_id}}" class="btn btn-info">Xem </a>
                                    </td>
                                    <td>
                                    <a name="" onclick="return confirm('Bạn chắc chắn muốn xoá khách hàng {{$r->customer_id}}')" 
                                    id="" class="btn btn-danger" href="{{route('removeCus').'/'.$r->customer_id}}" role="button">
                                    Xoá </a>
                                    </td>
                                </tr>
                                @endforeach
                           
                            </tbody>
                        </table> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- END container-fluid -->
    </div>
    <!-- END content -->
</div>

@endsection
@section('js')
 <!-- END main -->
 <script src="../assets/js/modernizr.min.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/detect.js"></script>
    <script src="../assets/js/fastclick.js"></script>
    <script src="../assets/js/jquery.blockUI.js"></script>
    <script src="../assets/js/jquery.nicescroll.js"></script>
    <!-- App js -->
    <script src="../assets/js/admin.js"></script>
    <!-- BEGIN Java Script for this page -->
    <script src="../assets/plugins/chart.js/Chart.min.js"></script>
    <script src="../assets/plugins/datatables/datatables.min.js"></script>

    <!-- Counter-Up-->
    <script src="../assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>

    <!-- dataTabled data -->
    <script src="../assets/data/data_datatables.js"></script>

    <!-- Charts data -->
    <!-- <script src="../assets/data/data_charts_dashboard.js"></script> -->

@endsection                 