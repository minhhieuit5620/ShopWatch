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
                        <h1 class="main-title float-left">Chào mừng bạn đến với hệ thống quản trị  <i class="fas fa-user-lock"></i></h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Trang chủ</li>
                                    
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-danger">
                <i class="far fa-user float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Khách hàng</h6>
                <h1 class="m-b-20 text-white counter">{{$customer_count}}</h1> 
                <a href="/Admin/Customer"><span class="text-white">Chi tiết</span></a>               
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-purple">
            <i class="fas fa-boxes float-right text-white"></i>
               
                <h6 class="text-white text-uppercase m-b-20">Sản phẩm</h6>
                <h1 class="m-b-20 text-white counter">{{$product_count}}</h1>
                <a href="/"><span class="text-white">Chi tiết</span></a>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-warning">
                <i class="fas fa-shopping-cart float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Đơn hàng</h6>
                <h1 class="m-b-20 text-white counter">{{$order_count}}</h1>   
                <a href="/Admin/Order"><span class="text-white">Chi tiết</span></a>         
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-info">
                <i class="fas fa-newspaper float-right text-white"></i>               
                <h6 class="text-white text-uppercase m-b-20">Tin tức</h6>
                <h1 class="m-b-20 text-white counter">{{$blog_count}}</h1>
                <a href="/Admin/Blog"><span class="text-white">Chi tiết</span></a>
            </div>
        </div>
    </div>
            <!-- end row -->
            <div class="row">
                <div class="col-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3>
                            <i class="fas fa-th"></i><font _mstmutation="1" _msthash="1743274" _msttexthash="1575912"> Sản phẩm</font></h3>
                        </div>
                        <div class="card-body" _msthash="1499953" _msttexthash="2568748">
                        <h1 class="text-center">Danh sách sản phẩm</h1>
            
            <a class="btn btn-primary"  style=" margin-bottom:20px;"data-toggle="modal" href='#modal-id'> <i class="fas fa-plus"></i> Thêm mới</a>
            <form style="float:right;" >
            <input type="text" placeholder="Search..." name="search" value="{{\Request::get('search')}}" >
            <button><i class="fas fa-search"></i></button>   
            </form>
            <!-- <select style="font-size:15px;" class="form-control" name="loai">
                <option value="">
                Loại Xe
                </option>
                @if(isset($dbloai))
                @foreach($dbloai as $l)
                <option value="{{$l->id}}" {{\Request::get("loai")== $l->id ? "selected='selected'":""}}>{{$l->nameCategory}}</option>
                @endforeach
                @endif
            </select> -->
 
            <div class="modal fade" id="modal-id">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <form action="{{route('productsave')}}" method="post">
                            @csrf
                        <div class="modal-header">
                        <h4 class="modal-title"> Thêm sản phẩm mới</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                              <label for="">Id</label>
                              <input type="text" name="txtid" class="form-control" placeholder="" aria-describedby="helpId">                              
                            </div>
                            <div class="form-group">
                              <label for="">Id loại sản phẩm</label>
                              <input type="text" name="txtcte"  class="form-control" placeholder="" aria-describedby="helpId">                              
                            </div>
                            <div class="form-group">
                              <label for="">Tên sản phẩm</label>
                              <input type="text" name="txtname"  class="form-control" placeholder="" aria-describedby="helpId">                              
                            </div>
                            <div class="form-group">
                              <label for="">Chi tiết</label>
                              <input type="text" name="txtct"  class="form-control" placeholder="" aria-describedby="helpId">                              
                            </div>
                            <div class="form-group">
                              <label for="">Hình ảnh</label>
                              <input type="file" name="txtimg" class="form-control-file" placeholder="" aria-describedby="helpId">                              
                            </div>
                            <div class="form-group">
                              <label class="form-check-label">Trạng thái</label>
                              <input type="checkbox" name="cbtt"  class="form-control" placeholder="" aria-describedby="helpId">                              
                            </div>
                            <div class="form-group">
                              <label for="">Giá bán</label>
                              <input type="text" name="txtgb" class="form-control" placeholder="" aria-describedby="helpId">                              
                            </div>
                            <div class="form-group">
                              <label for="">Giá cũ</label>
                              <input type="text" name="txtgc"  class="form-control" placeholder="" aria-describedby="helpId">                              
                            </div>
                            <div class="form-group">
                              <label for="">Giá nhập</label>
                              <input type="text" name="txtgn"  class="form-control" placeholder="" aria-describedby="helpId">                              
                            </div>
                            <div class="form-group">
                              <label for="">Số lượng</label>
                              <input type="text" name="txtsl"  class="form-control" placeholder="" aria-describedby="helpId">                              
                            </div>


                           
                                
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                            <button type="submit" name="cmd" class="btn btn-primary">Lưu</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>                
             <!--p><a href="{{route('productaddnew')}}" class="btn btn-info">Add new</a></p-->
             <table class="table table-bordered table-hover">
                 <thead>
                     <tr>
                         <th>STT</th>
                         <th>Tên sản phẩm</th>
                         <th>Loại sản phẩm</th>
                         <!-- <th>Chi tiết</th> -->
                         <th>Hình ảnh</th>
                         <th>Trạng thái</th>
                         <th>Giá bán</th>
                         <th>Giá cũ</th>
                         <th>Giá nhập</th>
                         <th>Số lượng</th>
                         <td>Sửa</td>
                         <td>Xóa</td>
                     </tr>
                 </thead>
                 <tbody>
                 @php
                     $TT=1;
                 @endphp
                 @isset($sp)
                 @foreach($sp as $r)
                     <tr>
                         <td>{{$TT++}}</td>
                         <td>{{$r->nameProduct}}</td>
                         <td>{{$r->idcategory}}</td>

                         <!-- <td>{{$r->description}}</td> -->
                         <td><img src="../img/dongho/{{$r->image}}" style="width:50px" alt=""></td>
                         <td>
                         <input type="checkbox" name="cbtt" id="cbtt" value="{{$r->status}}" {{$r->status==1?"checked":""}}>
                         </td>
                         <td>{{number_format($r->price,0)}} VNĐ</td>
                         <td>{{number_format($r->old_price,0)}} VNĐ</td>
                         <td>{{number_format($r->import_price,0)}} VNĐ</td>
                         <td>{{$r->quantity}}</td>
                         <td>
                         <a href="{{route('productedit').'/'.$r->id}}" class="btn btn-info">Sửa </a>
                         </td>
                         <td>
                         <a name="" onclick="return confirm('Bạn chắc chắn muốn xoá ? {{$r->id}}')" 
                         id="" class="btn btn-danger" href="{{route('productremove').'/'.$r->id}}" role="button">
                         Xoá </a>
                         </td>
                     </tr>
                     @endforeach
                     @endisset
                 </tbody>
             </table>
             <nav>
             {!! $sp->appends(['trang'=>'admin'])->links() !!}
             </nav>
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