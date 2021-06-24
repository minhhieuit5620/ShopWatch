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
                        <h1 class="main-title float-left">Người dùng</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Trang chủ</li>
                            <li class="breadcrumb-item active">Người dùng</li>
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
                            <span class="pull-right">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_user">
                                    <i class="fas fa-user-plus" aria-hidden="true"></i> Thêm mới người dùng</button>
                            </span>
                            <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_add_user" aria-hidden="true" id="modal_add_user">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{URL::to('Admin/add-user')}}" method="post" enctype="multipart/form-data">
                                           @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title">Thêm mới người dùng</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">×</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Họ và tên </label>
                                                            <input class="form-control" name="name" type="text" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Địa chỉ </label>
                                                            <input class="form-control" name="address" type="text" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Giới tính</label>
                                                           <select name="gender" id="" class="form-control">
                                                                <option value="Nam">Nam</option>
                                                                <option value="Nữ">Nữ</option>
                                                                <option value="Khác">Khác</option>
                                                           </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Email </label>
                                                            <input class="form-control" name="email" type="email" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Mật khẩu</label>
                                                            <input class="form-control" name="password" type="text" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                     <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Ngày sinh</label>
                                                            <input class="form-control" name="birthday" type="date">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Điện thoại</label>
                                                            <input class="form-control" name="phone" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                    <label>Chức vụ</label>
                                                        <select name="role_id" class="form-control" required="">
                                                            <option value="">- chọn -</option>
                                                            <optgroup label="Staff member">
                                                                <option value="1">Admin</option>
                                                                <option value="2">Manager</option>
                                                                <option value="3">Author</option>
                                                            </optgroup>
                                                            <optgroup label="Registered member">
                                                                <option value="4">User</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Trạng thái</label>
                                                            <input type="text" name="status" id="">
                                                            <!-- <select name="status" class="form-control">
                                                                <option value="1">YES</option>
                                                                <option value="0">NO</option>
                                                            </select> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                        <label>Ảnh đại diện :</label>
                                                        <br>
                                                        <input type="file" name="image">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Ngày bắt đầu</label>
                                                            <input class="form-control" name="start_day" type="date">
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Thêm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <h3>
                                <i class="far fa-user"></i> Danh sách người dùng</h3>
                        </div>
                        <!-- end card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="min-width:300px">Thông tin người dùng</th>
                                            <th style="width:120px">Chức vụ</th>
                                            <th style="min-width:110px;">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($get_All_User as $r)
                                        <tr>
                                            <td>
                                                <div class="user_avatar_list d-none d-none d-lg-block" style="margin-bottom: 90px;"><img alt="image" src="../img/avatar-adm/{{$r->avartar}}"></div>
                                                <h4>{{$r->full_name}}</h4>
                                                <p> <strong>Giới tính : </strong> {{$r->gender}}</p>                                              
                                                <p> <strong>Ngày sinh : </strong>{{$r->birthday}}</p>
                                                <p><strong>Địa chỉ liên hệ : </strong> {{$r->address}} , <strong>Điện thoại : </strong>{{$r->phone}}  , <strong>Email : </strong> {{$r->user_email}}</p>
                                                <p>{{$r->description}}</p>
                                                
                                            </td>

                                            <td>
                                            {{$r->name_role}}
                                            
                                            </td>


                                            <td>
                                                <a href="{{URL::to('/Admin/Edit-User').'/'.$r->id_user}}" class="btn btn-primary btn-sm btn-block"><i class="far fa-edit"></i> Edit</a>
                                                <a onclick="return confirm('Bạn chắc chắn muốn xoá người dùng {{$r->id_user}}')"  href="{{URL::to('/Admin/Delete-User').'/'.$r->id_user}}" class="btn btn-danger btn-sm btn-block mt-2"><i class="fas fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
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