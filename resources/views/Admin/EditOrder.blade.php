@extends('Layout.LayoutAdmin')
   
@section('css')
<link rel="shortcut icon" href="../assets/images/favicon.ico">

<!-- Bootstrap CSS -->
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<!-- Font Awesome CSS -->
<link href="/assets/font-awesome/css/all.css" rel="stylesheet" type="text/css" />

<!-- Custom CSS -->
<link href="/assets/css/style.css" rel="stylesheet" type="text/css" />

<!-- BEGIN CSS for this page -->
<link rel="stylesheet" type="text/css" href="/assets/plugins/chart.js/Chart.min.css" />
<link rel="stylesheet" type="text/css" href="/assets/plugins/datatables/datatables.min.css" />
@endsection

@section('content')     
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left" _msthash="1387295" _msttexthash="1575912">Xử lí đơn hàng</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item" _msthash="1710098" _msttexthash="47034">Trang chủ</li>
                            <li class="breadcrumb-item active" _msthash="1710826" _msttexthash="1575912">Đơn hàng</li>
                            <li class="breadcrumb-item active" _msthash="1710826" _msttexthash="1575912"> Xử lí đơn hàng</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-12">
                 @foreach($getOrderID as $r)
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3>
                            <i class="fas fa-table"></i><font _mstmutation="1" _msthash="1743274" _msttexthash="1575912"> Đơn hàng {{$r->order_id}}</font></h3>
                        </div>
                        <div class="card-body" _msthash="1499953" _msttexthash="2568748">
                        <!-- <h1 class="text-center">Sửa sản phẩm </h1> -->
                
                        
                            <!-- <h1 class="text-center">Đơn hàng {{$r->order_id}}</h1> -->
                                    
                            <form action="{{route('OrderPut')}}" method="post">
                            @csrf
                                <div class="form-group">
                                    <label for="my-input">Mã đơn hàng</label>
                                    <input id="my-input" name="order_id" value="{{$r->order_id}}" class="form-control" type="text" name="">
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Tên sản phẩm</label>
                                    <input id="my-input" name="product_name" value="{{$r->product_name}}" class="form-control" type="text" name="">
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Số lượng</label>
                                    <input id="my-input" name="product_quantity" value="{{$r->product_quantity}}" class="form-control" type="text" name="">
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Giá bán</label>
                                    <input id="my-input" name="price" value="{{$r->price}}" class="form-control" type="text" name="">
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Tổng tiền</label>
                                    <input id="my-input" name="order_total" value="{{$r->order_total}}" class="form-control" type="text" name="">
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Trạng thái đơn hàng</label>
                                    
                                    <select  id="input" name="order_status" class="form-control" required="required">
                                        <option value="{{$r->order_status}}">{{$r->order_status}}</option>
                                        <option value=" Hủy đơn hàng">
                                            <p>Hủy đơn hàng</p>
                                        </option>
                                        <option value=" Đặt hàng thành công">
                                            <p>Đặt hàng thành công</p>
                                        </option>
                                    </select>                                               
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Tên khách hàng</label>
                                    <input id="my-input" name="customer_name" value="{{$r->customer_name}}" class="form-control" type="text" name="">
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Điện thoại</label>
                                    <input id="my-input" name="customer_phone" value="{{$r->customer_phone}}" class="form-control" type="text" name="">
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Điạ chỉ giao hàng</label>
                                    <input id="my-input"  name="shipping_address"  value="{{$r->shipping_address}}" class="form-control" type="text" name="">
                                </div>                                      
                                <div class="form-group">
                                    <label for="my-input">Ghi chú khách hàng</label>
                                    <input id="my-input"  name="shipping_note" value="{{$r->shipping_note}}" class="form-control" type="text" name="">
                                </div>
                                
                            
                                <button type="submit" name="cmd" value="" class="btn btn-info">Lưu thông tin</button>
                            </form>
                           
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- END container-fluid -->
    </div>
    <!-- END content -->
</div>
 <!-- end row -->
 @endsection     

    @section('js')
    <script src="/assets/js/modernizr.min.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/moment.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/detect.js"></script>
    <script src="/assets/js/fastclick.js"></script>
    <script src="/assets/js/jquery.blockUI.js"></script>
    <script src="/assets/js/jquery.nicescroll.js"></script>
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
     <!-- CKediter -->
     <script src="{{ url('ckeditor/ckeditor.js') }}"></script>
    <script> CKEDITOR.replace('editor1'); </script>
    
    <!-- END Java Script for this page -->
 @endsection          
    
