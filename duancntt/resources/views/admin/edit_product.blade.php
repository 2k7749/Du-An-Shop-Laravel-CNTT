@extends('admin_layout')
@section('addPrdoduct')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhập sản phẩm
                </header>
                @php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span style="text-align: center;color: red;width: 100%;">',$message,'</span>';
                        Session::put('message',null);
                    }
                @endphp
                <div class="panel-body">
                    <div class="position-center">
                        @foreach ($edit_product as $item=>$product)
                        <form role="form" action="{{URL::to('/sc_admin/update-product/'.$product->product_id)}}" method="post" enctype="multipart/form-data">  
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="productName">Tên sản phẩm</label>
                                <input type="text" class="form-control" value="{{$product->product_name}}" name="product_name" id="productName" placeholder="Enter name product">
                            </div>
                            
                            <div class="form-group">
                                <label for="productPrice">Giá sản phẩm</label>
                                <input type="text" class="form-control" value="{{$product->product_price}}" name="product_price" id="productPrice" placeholder="Enter name product">
                            </div>

                            <div class="form-group">
                                <label for="productDescription">Hình ảnh sản phẩm</label>
                                <input type="file" rows="8" class="form-control" value="{{$product->product_image}}" name="product_image">
                                <img src="/public/upload/product/{{ $product->product_image}}" alt="" height="100px" width="120px">
                            </div>


                            <div class="form-group">
                                <label for="productDescription">Mô tả sản phẩm</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="product_desc" id="productDescription" placeholder="Mô tả sản phẩm"> {{$product->product_desc}} </textarea>
                            </div>

                            <div class="form-group">
                                <label for="productDescription">Nội dung sản phẩm</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="product_content" id="productContent" placeholder="Nội dung sản phẩm">{{$product->product_content}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Danh mục</label>
                                <select name="category_id" class="form-control input-sm m-bot15">
                                    @foreach ($category_product as $item=>$cate)
                                        @if ($cate->category_id == $product->category_id)
                                            <option value="{{$cate->category_id}}" selected="selected">{{$cate->category_name}}</option>    
                                        @else
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Thương hiệu</label>
                                <select name="brand_id" class="form-control input-sm m-bot15">
                                    @foreach ($brand_product as $item=>$brand)
                                        @if ($brand->brand_id == $product->brand_id)
                                            <option value="{{$brand->brand_id}}" selected="selected">{{$brand->brand_name}}</option>
                                        @else
                                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endif
                                        
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Hiện thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    @if ($product ->product_status == 1)
                                        <option value="1" selected="selected">Hiển thị</option>
                                    @else
                                        <option value="0">Ẩn</option>
                                    @endif

                                </select>
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info" >Cập nhập sản phẩm</button>
                        </form>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
