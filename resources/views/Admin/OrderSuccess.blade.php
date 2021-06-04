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
                        <h1 class="main-title float-left" _msthash="1387295" _msttexthash="1575912">Đơn hàng đã xử lí</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item" _msthash="1710098" _msttexthash="47034">Trang chủ</li>
                            <li class="breadcrumb-item active" _msthash="1710826" _msttexthash="1575912">Đơn hàng đã xử lí</li>
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
                            <i class="fas fa-table"></i><font _mstmutation="1" _msthash="1743274" _msttexthash="1575912"> Đơn hàng đã xử lí</font></h3>
                        </div>
                          <div class="card-body" _msthash="1499953" _msttexthash="2568748">
                            <h1 class="text-center">Danh sách đơn hàng đã xử lí</h1>            
                            <form style="float:right; margin-bottom:20px;" >
                            <input type="text" placeholder="Search..." name="search" value="{{\Request::get('search')}}" >
                            <button><i class="fas fa-search"></i></button>   
                            </form>           
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Mã khách hàng</th>
                                        <!-- <th>Chi tiết</th> -->
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th> 
                                        <td>Xem chi tiết</td> 
                                        <td>Xóa</td>                                               
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $TT=1;
                                @endphp
                                @isset($orderSuc)
                                @foreach($orderSuc as $r)
                                    <tr>
                                        <td>{{$TT++}}</td>
                                        <td>{{$r->order_id}}</td>
                                        <td>{{$r->customer_id}}</td>
                                        <td>
                                        <?php                                                                       
                                        echo str_replace(".00"," ", $r->order_total)."VNĐ" ;                                                                       
                                        ?>
                                        </td>
                                        <td>{{$r->order_status}} </td>
                                        
                                        <td>
                                        <a data-id="{{$r->order_id}}" href="{{URL::to('/Admin/DetailOrder/'.$r->order_id)}}" class="btn btn-info">Xem </a>
                                        </td>
                                        <td>
                                        <a name="" onclick="return confirm('Bạn chắc chắn muốn xoá đơn hàng {{$r->order_id}}')" 
                                        id="" class="btn btn-danger" href="{{route('OrderSucRemove').'/'.$r->order_id}}" role="button">
                                        Xoá </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endisset
                                </tbody>
                            </table>                           
                          </div>
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