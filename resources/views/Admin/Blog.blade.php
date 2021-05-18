@extends('Admin.Layout')

@section('content')
<div class="col-12">
        <div class="card mb-3">
                               
            <div class="card-body">
            <h1 class="text-center">Danh sách tin tức</h1>
            
            
            <a class="btn btn-primary"  style=" margin-bottom:20px;"data-toggle="modal" href='#modal-tt'> <i class="fas fa-plus"></i> Thêm mới</a>
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
 
            <div class="modal fade" id="modal-tt">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <form action="{{route('Blogsave')}}" method="post">
                            @csrf
                        <div class="modal-header">
                        <h4 class="modal-title"> Thêm tin tức mới</h4>
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
                                        <td>ID loại</td>
                                        <td><input type="text" name="txtct"></td>
                                    </tr>
                                    <tr>
                                        <td>Tiêu đề tin tức</td>
                                        <td><input type="text" name="txtname"></td>
                                    </tr>  
                                    <tr>
                                        <td>Nội dung tin tức</td>
                                        <td><input type="text" name="txtdescription"></td>
                                    </tr>                                                                  
                                    <tr>
                                        <td>Hình ảnh</td>
                                        <td><input type="file" name="txtimg"> </td>
                                    </tr>
                                    <tr>
                                        <td>trang thai</td>
                                        <td><input type="checkbox" name="cbtt"></td>
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
                         <th>Mã tin</th>
                         
                         <!-- <th>Chi tiết</th> -->
                         <th>Mã loại tin</th>
                         <th>Tiêu đề</th> 
                         <th>Hình ảnh</th> 
                         <th>Trạng thái</th>    
                         <td>Sửa</td>
                         <td>Xóa</td>
                     </tr>
                 </thead>
                 <tbody>
                 @php
                     $TT=1;
                 @endphp
                 @isset($get_all_blog)
                 @foreach($get_all_blog as $r)
                     <tr>
                         <td>{{$TT++}}</td>
                         <td>{{$r->id}}</td>
                         <td>{{$r->id_cate}}</td>
                         
                         <td>{{$r->nameBlog}} </td>
                       
                        <td><img style="width: 100px;" src="/img/blog/{{$r->image}}" alt=""></td>
                        <td> <input type="checkbox" name="cbtt" id="cbtt" value="{{$r->status}}" {{$r->status==1?"checked":""}}>
                       </td>
                         <td>
                         <a data-id="{{$r->id}}" href="{{route('EditBlog').'/'.$r->id}}" class="btn btn-info">Sửa </a>
                         </td>
                         <td>
                         <a name="" onclick="return confirm('Bạn chắc chắn muốn xoá tin tức {{$r->id}}')" 
                         id="" class="btn btn-danger" href="{{route('BlogRemove').'/'.$r->id}}" role="button">
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