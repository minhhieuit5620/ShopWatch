@extends('Admin.Layout')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-danger">
                <i class="far fa-user float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Khách hàng</h6>
                <h1 class="m-b-20 text-white counter">{{$customer_count}}</h1> 
                <a href=""><span class="text-white">Chi tiết</span></a>               
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-purple">
            <i class="fas fa-boxes float-right text-white"></i>
               
                <h6 class="text-white text-uppercase m-b-20">Sản phẩm</h6>
                <h1 class="m-b-20 text-white counter">{{$product_count}}</h1>
                <a href=""><span class="text-white">Chi tiết</span></a>
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
                <a href=""><span class="text-white">Chi tiết</span></a>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card mb-3">
                               
            <div class="card-body">
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
                        
                            <table class="table table-bordered table-hover">                
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td><input type="text" name="txtid"></td>
                                    </tr>
                                    <tr>
                                        <td>ID loại sản phẩm</td>
                                        <td><input type="text" name="txtcte"></td>
                                    </tr>
                                    <tr>
                                        <td>Tên sản phẩm</td>
                                        <td><input type="text" name="txtname"></td>
                                    </tr>
                                    <tr>
                                        <td>Chi tiết</td>
                                        <td><input type="text" name="txtct"></td>
                                    </tr>
                                    <tr>
                                        <td>Hình ảnh</td>
                                        <td><input type="file" name="txtimg"> </td>
                                    </tr>
                                    <tr>
                                        <td>trang thai</td>
                                        <td><input type="checkbox" name="cbtt"></td>
                                    </tr>
                                    <tr>
                                        <td>giá bán</td>
                                        <td><input type="text" name="txtgb"></td>
                                    </tr>
                                    <tr>
                                        <td>giá cũ</td>
                                        <td><input type="text" name="txtgc"></td>
                                    </tr>
                                    <tr>
                                        <td>giá nhập</td>
                                        <td><input type="text" name="txtgn"></td>
                                    </tr>
                                    <tr>
                                        <td>số lượng</td>
                                        <td><input type="text" name="txtsl"></td>
                                    </tr>
                                </tbody>
                            </table>
                                
                        
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
                             <!-- end card-body-->
        </div>
                         <!-- end card-->
    </div>
@endsection
                   