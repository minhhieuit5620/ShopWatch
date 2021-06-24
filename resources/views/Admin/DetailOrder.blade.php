@extends('Layout.LayoutAdmin')
@section('css')
  <!-- Favicon -->
  <link rel="shortcut icon" href="/assets/images/favicon.ico">

<!-- Bootstrap CSS -->
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<!-- Font Awesome CSS -->
<link href="/assets/font-awesome/css/all.css" rel="stylesheet" type="text/css" />

<!-- Custom CSS -->
<link href="/assets/css/style.css" rel="stylesheet" type="text/css" />

<!-- BEGIN CSS for this page -->
<link rel="stylesheet" type="text/css" href="/assets/plugins/chart.js/Chart.min.css" />
<link rel="stylesheet" type="text/css" href="/assets/plugins/datatables/datatables.min.css" />
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
                                <h1 class="main-title float-left">Chi tiết đơn hàng</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Trang chủ
                                    </li>
                                    <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    @foreach($getOrderID as $r)
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                            <div class="card mb-3">

                                <div class="card-header">
                                    <h3><i class="fas fa-table"></i> Chi tiết đơn hàng</h3>
                                </div>

                                <div class="card-body">

                                    <div class="container">

                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="invoice-title text-center mb-3">
                                                    <h2>Đơn hàng #{{$r->order_id}} </h2>
                                                    <p><strong>Trạng thái</strong>  : {{$r->order_status}}</p>
                                                  
                                                    <strong>Ngày đặt hàng:</strong> 
                                                    <?php
                                                        echo  date("d/m/Y", strtotime($r->order_date));
                                                    ?>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                                        <h5>Thông tin khách hàng:</h5>
                                                        <address>
                                                            Tên khách hàng : {{$r->customer_name}}<br>
                                                            Địa chỉ Email : {{$r->customer_email}}<br>
                                                            Số điện thoại : {{$r->customer_phone}}<br>                                                           
                                                        </address>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-6 text-right">
                                                        <h5>Địa chỉ giao hàng:</h5><br>
                                                        <address>
                                                            {{$r->shipping_address}}
                                                        </address>
                                                        
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6">
                                                        <h5>Hình thức thanh toán :</h5>
                                                        <address>
                                                            Thanh toán khi nhận hàng
                                                        </address>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 text-right">
                                                        <h5>Ngày đặt hàng:</h5>
                                                        <address>
                                                        <?php
                                                        echo  date("d/m/Y", strtotime($r->order_date));
                                                        ?>
                                                     
                                                       <br><br>
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title"><strong>Chi tiết đơn hàng</strong></h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-condensed">
                                                                <thead>
                                                                    <tr>
                                                                        <td><strong>Mã chi tiết đơn hàng</strong></td>
                                                                        <td class="text-center"><strong>Tên sản phẩm</strong>
                                                                        </td>
                                                                        <td class="text-center"><strong>Đơn giá</strong>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <strong>Số lượng</strong></td>
                                                                        <td class="text-right"><strong>Tổng tiền</strong>
                                                                        </td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td >{{$r->order_detail_id}}</td>
                                                                        <!-- <td class="text-center">$10.99</td>
                                                                        <td class="text-center">1</td>
                                                                        <td class="text-center">aa</td>
                                                                        <td class="text-right">$10.99</td> -->
                                                                        <td class="text-center">{{$r->product_name}}</td>
                                                                        <td class="text-center">{{number_format($r->price,0)}} VNĐ</td>
                                                                        <td class="text-center">{{$r->product_quantity}}</td>
                                                                       
                                                                        <td class="text-right">
                                                                            <?php                                                                            
                                                                            echo str_replace(".00"," ", $r->order_total)."VNĐ" ;                                                                            
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                   
                                                                   
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- end card body -->

                            </div>
                            <!-- end card-->

                        </div>
                        <!-- end col-->

                    </div>
                    <!-- end row-->
                    @endforeach

                </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
        @endsection
@section('js')
 <!-- END main -->
 <script src="/assets/js/modernizr.min.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/moment.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/detect.js"></script>
    <script src="/assets/js/fastclick.js"></script>
    <script src="/assets/js/jquery.blockUI.js"></script>
    <script src="/assets/js/jquery.nicescroll.js"></script>
    <!-- App js -->
    <script src="/assets/js/admin.js"></script>
    <!-- BEGIN Java Script for this page -->
    <script src="/assets/plugins/chart.js/Chart.min.js"></script>
    <script src="/assets/plugins/datatables/datatables.min.js"></script>

    <!-- Counter-Up-->
    <script src="/assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="/assets/plugins/counterup/jquery.counterup.min.js"></script>

    <!-- dataTabled data -->
    <script src="/assets/data/data_datatables.js"></script>

    <!-- Charts data -->
    <!-- <script src="../assets/data/data_charts_dashboard.js"></script> -->

@endsection                 