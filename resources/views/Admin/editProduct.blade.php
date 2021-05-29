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

<div class="col-12">
        <div class="card mb-3">
           
            <div class="card-body">
                <h1 class="text-center">Sửa sản phẩm {{$db->id}}</h1>
                
                    <form action="{{route('productput')}}" method="post">
                    @csrf
                    <table class="table table-striped table-bordered table-hover">                
                        <tbody>
                        <tr>
                                <td>ID</td>
                                <td><input type="text" name="txtid" value="{{$db->id}}"></td>
                            </tr>
                            <tr>
                                <td>ID loại sản phẩm</td>
                                <td><input type="text" name="txtcte" value="{{$db->idcategory}}"></td>
                            </tr>
                            <tr>
                                <td>Tên sản phẩm</td>
                                <td><input type="text" name="txtname" value="{{$db->nameProduct}}"></td>
                            </tr>
                        
                            <tr>
                                <td>Hình ảnh</td>
                                <td>
                            
                               
                                    <input type="text" name="txtimg" value="{{$db->image}}">
                                </td>
                            </tr>
                            
                            <tr>
                                <td>trang thai</td>
                                <td><input type="checkbox" name="cbtt" value="{{$db->status}}"></td>
                            </tr>
                            <tr>
                                <td>giá bán</td>
                                <td><input type="text" name="txtgb" value="{{$db->price}}"></td>
                            </tr>
                            <tr>
                                <td>giá cũ</td>
                                <td><input type="text" name="txtgc" value="{{$db->old_price}}"></td>
                            </tr>
                            <tr>
                                <td>giá nhập</td>
                                <td><input type="text" name="txtgn" value="{{$db->import_price}}"></td>
                            </tr>
                            <tr>
                                <td>số lượng</td>
                                <td><input type="text" name="txtsl" value="{{$db->quantity}}"></td>
                            </tr>
                            <tr>
                                <td>Chi tiết</td>
                            
                                <td><!--input type="text" id="editor1" name="txtct" value="{{$db->description}}"-->
                                    <textarea name="txtct" id="editor1" cols="30" rows="10">{{$db->description}}</textarea>
                                
                                </td>
                            </tr>
                        </tbody>
                        
                    </table>
                    
                        <button type="submit" name="cmd" value="" class="btn btn-info">Lưu thông tin</button>
                    </form>
            </div>
        </div>                  
    
</div>

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