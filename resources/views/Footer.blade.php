@extends('Layout')

@section('footer')
<div class="container">
            <div class="row justify-content-around">
                <div class="col-sm-6 col-lg-3">
                    <div class="single_footer_part">
                        <h4>Sản phẩm hàng đầu</h4>
                        <ul class="list-unstyled">
                        @foreach($lsp as $r)
                            <li><a href="">{{$r->nameCategory}}</a></li>
                            
                        @endforeach    
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_footer_part">
                        <h4>Thương hiệu nổi tiếng</h4>
                        <ul class="list-unstyled">
                        @foreach($th as $r)
                            <li><a href="">{{$r->name}}</a></li>
                            
                        @endforeach  
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_footer_part">
                        <h4>Tính năng</h4>
                        <ul class="list-unstyled">
                        @foreach($menu as $r)
                            <li><a href="">{{$r->content}}</a></li>
                            
                        @endforeach  
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_footer_part">
                        <h4>Tin tức</h4>
                        <ul class="list-unstyled">
                        @foreach($tt as $r)
                            <li><a href="">{{$r->nameBlog}}</a></li>
                            
                        @endforeach  
                        </ul>
                    </div>
                </div>
               
            </div>

        </div>
        @endsection