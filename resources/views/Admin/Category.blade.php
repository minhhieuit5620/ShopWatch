@extends('Admin.Layout')

@section('content')
<div class="col-12">
        <div class="card mb-3">
                               
            <div class="card-body">
            <h1 class="text-center">Danh sách loại sản phẩm</h1>
            
            
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
                    <form action="{{route('CateSave')}}" method="post">
                            @csrf
                        <div class="modal-header">
                        <h4 class="modal-title"> Thêm loại sản phẩm mới</h4>
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
                                        <td>Tên loại sản phẩm</td>
                                        <td><input type="text" name="txtname"></td>
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
                                        <td>ghi chú</td>
                                        <td><input type="text" name="txtnote"></td>
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
                         <th>Mã loại</th>
                         
                         <!-- <th>Chi tiết</th> -->
                         <th>Tên loại</th>
                         <th>Trạng thái</th> 
                         <th>Ghi chú</th>     
                         <td>Sửa</td>
                         <td>Xóa</td>
                     </tr>
                 </thead>
                 <tbody>
                 @php
                     $TT=1;
                 @endphp
                 @isset($allCate)
                 @foreach($allCate as $r)
                     <tr>
                         <td>{{$TT++}}</td>
                         <td>{{$r->id}}</td>
                         <td>{{$r->nameCategory}}</td>
                         <td>
                         <input type="checkbox" name="cbtt" id="cbtt" value="{{$r->status}}" {{$r->status==1?"checked":""}}>
                         </td>
                         <td>{{$r->note}} </td>
                        
                         <td>
                         <a data-id="{{$r->id}}" href="{{route('EditCate').'/'.$r->id}}" class="btn btn-info">Sửa </a>
                         </td>
                         <td>
                         <a name="" onclick="return confirm('Bạn chắc chắn muốn xoá loại sản phẩm {{$r->id}}')" 
                         id="" class="btn btn-danger" href="{{route('CateRemove').'/'.$r->id}}" role="button">
                         Xoá </a>
                         </td>
                     </tr>
                     @endforeach
                     @endisset
                 </tbody>
             </table>
            
            </div>
                             <!-- end card-body-->
        </div>
                         <!-- end card-->
    </div>
@endsection