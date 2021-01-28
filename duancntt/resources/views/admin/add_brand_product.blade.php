@extends('admin_layout')
@section('addBrandPrdoduct')


<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Thêm thương hiệu sản phẩm
    </h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
            @php
                $message = Session::get('message');
                if ($message) {
                    echo '<span style="text-align: center;color: red;width: 100%;">',$message,'</span>';
                    Session::put('message',null);
                }
            @endphp
        <!-- BEGIN: Form Layout -->
        <form role="form" action="{{URL::to('/sc_admin/save-brandproduct')}}" method="post">  
            {{ csrf_field() }}
        <div class="intro-y box p-5">
            <div>
                <label>Tên thương hiệu</label>
                <input type="text" name="brand_product_name" id="brandName" class="input w-full border mt-2" placeholder="Nhập tên danh mục">
            </div>
           
            
            <div class="mt-3">
                <label>Mô tả thương hiệu</label>
                <div class="mt-2">
                    <textarea placeholder="Nhập nội dung mô tả về thương hiệu" class="summernote" name="brand_product_desc" id="brandDescription"></textarea>
                </div>
            </div>

            <div class="sm:mt-2">Hiện thị
                <select name="brand_product_status" class="input input--sm border mr-2">
                    <option value="0">Ẩn</option>
                    <option value="1">Hiển thị</option>
                </select>
            </div>

            <div class="text-right mt-5">
                <button  type="submit" name="add_brand_product" type="button" class="button w-24 bg-theme-1 text-white">Thêm thương hiệu</button>
            </div>
        </div>
        </form>
        <!-- END: Form Layout -->
    </div>
</div>


@endsection
