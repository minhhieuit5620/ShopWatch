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
<!-- end row -->
<div class="col-12">
                            <div class="card mb-3">
                               @foreach($db as $r)
                                <div class="card-body">
                                <h1 class="text-center">Sửa loại sản phẩm {{$r->id}}</h1>
                                    
                                        <form action="{{route('CatePut')}}" method="post">
                                        @csrf
                                            <div class="form-group">
                                                <label for="my-input">Mã loại sản phẩm</label>
                                                <input id="my-input" name="txtid" value="{{$r->id}}" class="form-control" type="text" name="">
                                            </div>
                                            <div class="form-group">
                                                <label for="my-input">Tên loại sản phẩm</label>
                                                <input id="my-input" name="txtname" value="{{$r->nameCategory}}" class="form-control" type="text" name="">
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
                                                <input id="my-input" name="txtnote" value="{{$r->note}}" class="form-control" type="text" name="">
                                            </div>
                                         
                                        
                                            <button type="submit" name="cmd" value="" class="btn btn-info">Lưu thông tin</button>
                                        </form>
                                </div>
                                @endforeach
                            </div>
                        </div>    
</div>
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
    
 @endsection          
