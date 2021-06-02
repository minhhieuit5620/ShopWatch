

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
                        <h1 class="main-title float-left" _msthash="1387295" _msttexthash="1575912">Sửa tin tức</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item" _msthash="1710098" _msttexthash="47034">Trang chủ</li>
                            <li class="breadcrumb-item active" _msthash="1710826" _msttexthash="1575912">Tin tức</li>
                            <li class="breadcrumb-item active" _msthash="1710826" _msttexthash="1575912"> Sửa tin tức</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-12">
                 @foreach($db as $r)
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3>
                            <i class="fab fa-wpforms"></i><font _mstmutation="1" _msthash="1743274" _msttexthash="1575912"> Sửa tin tức {{$r->id}}</font></h3>
                        </div>
                        <div class="card-body" _msthash="1499953" _msttexthash="2568748">                                
                            <form action="{{route('BlogPut')}}" method="post">
                            @csrf
                                <div class="form-group">
                                    <label for="my-input">Mã  tin tức</label>
                                    <input id="my-input" name="txtid" value="{{$r->id}}" class="form-control" type="text" name="">
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Mã loại tin tức</label>
                                    <input id="my-input" name="txtct" value="{{$r->id_cate}}" class="form-control" type="text" name="">
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Tiêu đề</label>
                                    <input id="my-input" name="txtname" value="{{$r->nameBlog}}" class="form-control" type="text" name="">
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Hình ảnh</label>
                                    <input id="my-input" name="txtimg" value="{{$r->image}}" class="form-control" type="text" name="">
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Trạng thái</label>
                                    <input  id="my-input" type="checkbox" name="cbtt" id="cbtt" value="{{$r->status}}" {{$r->status==1?"checked":""}}>
                                
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Ghi chú</label>
                                    <textarea name="txtdes" id="editor1" cols="30" rows="10">{{$r->description}}</textarea>                                               
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

<!-- end row-->
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
    
 @endsection          