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
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="far fa-user"></i>Thông tin của bạn</h3>
                            </div>
                            <div class="card-body">
                                @foreach($profile as $r)
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
                                @endforeach
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="far fa-file-image"></i>Ảnh đại diện</h3>
                            </div>
                            <div class="card-body text-center">
                                @foreach($profile as $r)
                                <form action="{{URL::to('/Admin/PostAvt/'.$r->id_user)}}" method="post">
                                    @csrf
                                    <div class="row">                  
                                        <div class="col-lg-12">
                                            <img alt="avatar"  class="img-fluid" src="../img/avatar-adm/{{$r->avartar}}">
                                        </div>
                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="button" class="btn btn-danger btn-block mt-3">Delete avatar</button>
                                        </div>
                                        <div class="col-lg-12">
                                        <input type="file" name="avatar" class="btn btn-info btn-block mt-3" id="" value="Thay thế">
                                            <!-- <button type="file" class="btn btn-info btn-block mt-3">Change avatar</button> -->
                                        </div>
                                    </div>
                                </form>
                                @endforeach
                            
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                                        <!-- end col -->
                </div>  

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
<script>
$(document).ready(function(){
    $("#change_pass").change(function(){
        if($(this).is(":checked")){
            $(".pass").removeAttr('disabled');
        }
        else{
            $(".pass").attr('disabled','');
        }
    });
});

</script>

@endsection                 