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
                                <h1 class="main-title float-left" _msthash="1387295" _msttexthash="158366">Thông tin chi tiết khách hàng</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item" _msthash="1710098" _msttexthash="47034">Trang chủ</li>
                                    <li class="breadcrumb-item active" _msthash="1710826" _msttexthash="158366">Khách hàng</li>
                                    <li class="breadcrumb-item active" _msthash="1710826" _msttexthash="158366">Thông tin chi tiết khách hàng</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                            <div class="card mb-3">

                                <div class="card-header">
                                    <h3><i class="fas fa-users"></i><font _mstmutation="1" _msthash="1743274" _msttexthash="2572804"> Thông tin chi tiết khách hàng</font></h3>
                                </div>

                                <div class="card-body">

                                    <div class="container">
                                      
                                        <div class="row">

                                            <div class="col-md-12">
                                              
                                                
                                                <div class="row">
                                                @foreach($cus as $a)
                                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                                        <h5 _msthash="4117269" _msttexthash="1994577">Thông tin:</h5>
                                                        <address>
                                                            Tên khách hàng : {{$a->customer_name}}<br>
                                                           Địa chỉ Email : {{$a->customer_email}}<br>
                                                            Số điện thoại : {{$a->customer_phone}}<br>
                                                            
                                                        </address>
                                                    </div>
                                                   
                                                    @endforeach
                                                </div>
                                                
                                               
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title"><strong _msthash="4112927" _msttexthash="1467908">Các đơn hàng đã đặt</strong></h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-condensed">
                                                                <thead>
                                                                    <tr>
                                                                        <td><strong _msthash="7238218" _msttexthash="1068860">Mã đơn hàng</strong></td>
                                                                        <td class="text-center"><strong _msthash="7239700" _msttexthash="46618">Số lượng sản phẩm</strong>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <strong _msthash="7241182" _msttexthash="2064985">Địa chỉ giao hàng</strong></td>
                                                                            <td class="text-center">
                                                                            <strong _msthash="7241182" _msttexthash="2064985">Ngày đặt hàng</strong></td>
                                                                        <td class="text-right"><strong _msthash="7242664" _msttexthash="2101905">Tổng tiền</strong>
                                                                        </td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($detailCus as $r)
                                                                    <tr>  
                                                                       
                                                                        <td _msthash="7276633" _msttexthash="40755"><a href="{{URL::to('/Admin/DetailOrder/'.$r->order_id)}}">{{$r->order_id}}</a></td>
                                                                        <td class="text-center" _msthash="7278115" _msttexthash="69823">{{$r->product_quantity}}</td>
                                                                        <td class="text-center" _msthash="7279597" _msttexthash="4459">{{$r->shipping_address}}</td>
                                                                        <td class="text-center" _msthash="7279597" _msttexthash="4459">
                                                                             <?php
                                                                            echo  date("d/m/Y", strtotime($r->order_date));
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-right" _msthash="7281079" _msttexthash="69823">
                                                                        <?php
                                                                       
                                                                        echo str_replace(".00"," ", $r->order_total)."VNĐ" ;
                                                                        
                                                                        ?>
                                                                        
                                                                        </td>
                                                                      
                                                                        
                                                                        
                                                                    </tr>
                                                                    @endforeach
                                                                    <tr>
                                                                        <td class="thick-line"></td>
                                                                        <td class="thick-line"></td>
                                                                        <td class="thick-line"></td>
                                                                        <td class="thick-line text-center">
                                                                            <strong _msthash="7283848" _msttexthash="2223637">Tổng số tiền đã thanh toán : </strong></td>
                                                                        <td class="thick-line text-right" _msthash="7285330" _msttexthash="81744">
                                                                                11
                                                                        <?php
                                                                    //     $a=array($r->order_id);
                                                                    //     $n=current$r->order_id);
                                                                    //     echo $n; 
                                                                    //     print_r($a);
                                                                    //     // for(i=0;i<=n;i++){

                                                                    //     // }
                                                                    //     //  echo str_replace(".00"," ",Cart::subtotal())  VNĐ
                                                                    //   // echo array_sum($r->order_total);
                                                                       
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