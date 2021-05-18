@extends('Admin.Layout')

@section('content')
<div class="col-12">
        <div class="card mb-3">
                               
            <div class="card-body">
            <h1 class="text-center">Danh sách đơn hàng đã xử lí</h1>
            
           
            <form style="float:right; margin-bottom:20px;" >
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
 
                    
             <!--p><a href="{{route('productaddnew')}}" class="btn btn-info">Add new</a></p-->
             <table class="table table-bordered table-hover">
                 <thead>
                     <tr>
                         <th>STT</th>
                         <th>Mã đơn hàng</th>
                         <th>Mã khách hàng</th>
                         <!-- <th>Chi tiết</th> -->
                         <th>Tổng tiền</th>
                         <th>Trạng thái</th> 
                         <td>Xem chi tiết</td> 
                         <td>Xóa</td>                                               
                     </tr>
                 </thead>
                 <tbody>
                 @php
                     $TT=1;
                 @endphp
                 @isset($orderSuc)
                 @foreach($orderSuc as $r)
                     <tr>
                         <td>{{$TT++}}</td>
                         <td>{{$r->order_id}}</td>
                         <td>{{$r->customer_id}}</td>
                         <td>{{$r->order_total}} VNĐ</td>
                         <td>{{$r->order_status}} </td>
                        
                         <td>
                         <a data-id="{{$r->order_id}}" href="{{route('OrderEdit').'/'.$r->order_id}}" class="btn btn-info">Xem </a>
                         </td>
                         <td>
                         <a name="" onclick="return confirm('Bạn chắc chắn muốn xoá đơn hàng {{$r->order_id}}')" 
                         id="" class="btn btn-danger" href="{{route('OrderSucRemove').'/'.$r->order_id}}" role="button">
                         Xoá </a>
                         </td>
                     </tr>
                     @endforeach
                     @endisset
                 </tbody>
             </table>
            
                         
             <nav>
             
             </nav>
            </div>
                             <!-- end card-body-->
        </div>
                         <!-- end card-->
    </div>
@endsection