@extends('admin_layout')
@section('addPrdoduct')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Thêm sản phẩm
    </h2>
</div>
@php
    $message = Session::get('message');
    if ($message) {
        echo '<span style="text-align: center;color: red;width: 100%;">',$message,'</span>';
        Session::put('message',null);
    }
@endphp
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Form Layout -->
        @foreach ($edit_product as $item=>$product)
            <form role="form" action="{{URL::to('/sc_admin/update-product/'.$product->product_id)}}" method="post" enctype="multipart/form-data">  
                {{ csrf_field() }}
                <div class="intro-y box p-5">
                    <div>
                        <label>Tên sản phẩm</label>
                        <input type="text" value="{{$product->product_name}}" class="input w-full border mt-2" name="product_name" id="productName" placeholder="Enter name product">
                    </div>
                    <div class="mt-3">
                        <label>Danh mục</label>
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <select class="input w-full border flex-1" name="category_id">
                                @foreach ($category_product as $item=>$cate)
                                        @if ($cate->category_id == $product->category_id)
                                            <option value="{{$cate->category_id}}" selected="selected">{{$cate->category_name}}</option>    
                                        @else
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endif

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>Thương hiệu</label>
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <select class="input w-full border flex-1" name="brand_id">
                                @foreach ($brand_product as $item=>$brand)
                                    @if ($brand->brand_id == $product->brand_id)
                                        <option value="{{$brand->brand_id}}" selected="selected">{{$brand->brand_name}}</option>
                                    @else
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>Giá sản phẩm</label>
                        <div class="relative mt-2">
                            <input type="text" value="{{$product->product_price}}" class="input pr-12 w-full border col-span-4" name="product_price" id="productPrice" placeholder="Enter name price">
                            <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">vnđ</div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="form-group note-form-group note-group-select-from-files">
                            <label >Hình ảnh sản phẩm</label>
                            <input class="input w-full border mt-2" value="{{$product->product_image}}" type="file" name="product_image">
                            <img src="/public/upload/product/{{ $product->product_image}}" alt="" height="100px" width="120px">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>Mô tả sản phẩm</label>
                        <div class="mt-2">
                            <textarea data-feature="basic" class="summernote" name="product_desc" id="productDescription" placeholder="Mô tả sản phẩm">@php echo $product->product_desc; @endphp</textarea>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label>Nội dung sản phẩm</label>
                        <div class="mt-2">
                            <textarea data-feature="basic" class="summernote" name="product_content" id="productContent" placeholder="Nội dung sản phẩm">@php $product->product_content;@endphp</textarea>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label>Active Status</label>
                        <select name="product_status" class="input input--sm border mr-2">
                            @if ($product ->product_status == 1)
                                <option value="1" selected="selected">Hiển thị</option>
                            @else
                                <option value="0">Ẩn</option>
                            @endif
                        </select>
                    </div>

                    <div class="text-right mt-5">
                        <button type="submit" class="button w-40 bg-theme-1 text-white" name="add_product">Cập nhập sản phẩm</button>
                    </div>
                </div>
            </form>
        @endforeach
        <!-- END: Form Layout -->
    </div>
</div>
@endsection
