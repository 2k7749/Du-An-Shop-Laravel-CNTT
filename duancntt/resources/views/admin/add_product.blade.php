@extends('admin_layout')
@section('addPrdoduct')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
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
                        <form role="form" action="{{URL::to('/sc_admin/save-product')}}" method="post" enctype="multipart/form-data">  
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="productName">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="product_name" id="productName" placeholder="Enter name product">
                            </div>
                            
                            <div class="form-group">
                                <label for="productPrice">Giá sản phẩm</label>
                                <input type="text" class="form-control" name="product_price" id="productPrice" placeholder="Enter name product">
                            </div>

                            <div class="form-group">
                                <label for="productDescription">Hình ảnh sản phẩm</label>
                                <input type="file" rows="8" class="form-control" name="product_image">
                            </div>


                            <div class="form-group">
                                <label for="productDescription">Mô tả sản phẩm</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="product_desc" id="productDescription" placeholder="Mô tả sản phẩm"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="productDescription">Nội dung sản phẩm</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="product_content" id="productContent" placeholder="Nội dung sản phẩm"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Danh mục</label>
                                <select name="category_id" class="form-control input-sm m-bot15">
                                    @foreach ($category_product as $item=>$cate)
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Thương hiệu</label>
                                <select name="brand_id" class="form-control input-sm m-bot15">
                                    @foreach ($brand_product as $item=>$brand)
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Hiện thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info" >Thêm sản phẩm</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
