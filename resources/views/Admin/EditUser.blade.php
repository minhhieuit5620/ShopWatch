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
                        <h1 class="main-title float-left" _msthash="1387295" _msttexthash="1575912">Người dùng</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item" _msthash="1710098" _msttexthash="47034">Trang chủ</li>
                            <li class="breadcrumb-item active" _msthash="1710826" _msttexthash="1575912">Người dùng</li>
                            <li class="breadcrumb-item active" _msthash="1710826" _msttexthash="1575912"> Sửa thông tin người dùng</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-12">
                 @foreach($get_id as $r)
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3>
                            <i class="far fa-user"></i><font _mstmutation="1" _msthash="1743274" _msttexthash="1575912"> Người dùng {{$r->id_user}}</font></h3>
                        </div>
                        <div class="card-body" _msthash="1499953" _msttexthash="2568748">
                        <!-- <h1 class="text-center">Sửa sản phẩm </h1> -->
                
                        
                            <form action="{{URL::to('/Admin/Put-Profile/'.$r->id_user)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Họ và tên</label>
                                                <input class="form-control" name="name" type="text"  placeholder="Họ và tên"  value="{{$r->full_name}}" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input class="form-control" name="address" type="text" value="{{$r->address}}" placeholder="Địa chỉ" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Email </label>
                                                <input class="form-control" name="email" type="email" value="{{$r->user_email}}" required />
                                            </div>
                                        </div>
                                    
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Giới tính</label>
                                                <input class="form-control" name="gender" type="text" value="{{$r->gender}}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-12">
                                    <input type="checkbox" name="checkpassword" id="change_pass">
                                    <label for="">Đổi mật khẩu</label>
                                
                                    </div>
                                    <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Mật khẩu</label>
                                                <input class="form-control pass" name="password" type="password" value="" disabled/>
                                            </div>
                                        </div>
                                    
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Ngày sinh</label>
                                                <input class="form-control" name="birthday" type="date" value="{{$r->birthday}}" />  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Nhập lại mật khẩu</label>
                                                <input class="form-control pass" name="passwordAgain" type="password" value="" disabled />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input class="form-control" name="phone" type="text" value="{{$r->phone}}" />
                                            </div>
                                        </div>                    
                                    </div>
                                    <div class="row">                    
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Trạng thái</label>
                                                <input class="form-control" name="status" type="checkbox" value="{{$r->status}}" {{$r->status==1?"checked":""}} />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <hr>
                                            <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                                        </div>
                                    </div>
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
    
