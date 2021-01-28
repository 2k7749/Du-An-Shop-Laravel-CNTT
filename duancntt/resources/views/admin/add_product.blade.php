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
        <form role="form" action="{{URL::to('/sc_admin/save-product')}}" method="post" enctype="multipart/form-data">  
            {{ csrf_field() }}
            <div class="intro-y box p-5">
                <div>
                    <label>Tên sản phẩm</label>
                    <input type="text" class="input w-full border mt-2" name="product_name" id="productName" placeholder="Enter name product">
                </div>
                <div class="mt-3">
                    <label>Danh mục</label>
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <select class="input w-full border flex-1" name="category_id">
                            @foreach ($category_product as $item=>$cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-3">
                    <label>Thương hiệu</label>
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <select class="input w-full border flex-1" name="brand_id">
                            @foreach ($brand_product as $item=>$brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-3">
                    <label>Giá sản phẩm</label>
                    <div class="relative mt-2">
                        <input type="text" class="input pr-12 w-full border col-span-4" name="product_price" id="productPrice" placeholder="Enter name price">
                        <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">vnđ</div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="form-group note-form-group note-group-select-from-files">
                        <label >Hình ảnh sản phẩm</label>
                        <input class="input w-full border mt-2" type="file" name="product_image">
                    </div>
                </div>
                <div class="mt-3">
                    <label>Mô tả sản phẩm</label>
                    <div class="mt-2">
                        <textarea data-feature="basic" class="summernote" name="product_desc" id="productDescription" placeholder="Mô tả sản phẩm"></textarea>
                    </div>
                </div>

                <div class="mt-3">
                    <label>Nội dung sản phẩm</label>
                    <div class="mt-2">
                        <textarea data-feature="basic" class="summernote" name="product_content" id="productContent" placeholder="Nội dung sản phẩm"></textarea>
                    </div>
                </div>

                <div class="mt-3">
                    <label>Active Status</label>
                    <select name="product_status" class="input input--sm border mr-2">
                        <option value="0">Ẩn</option>
                        <option value="1">Hiển thị</option>
                    </select>
                </div>

                <div class="text-right mt-5">
                    <button type="submit" class="button w-24 bg-theme-1 text-white" name="add_product">Thêm sản phẩm</button>
                </div>
            </div>
        </form>
        <!-- END: Form Layout -->
    </div>
</div>
@endsection
