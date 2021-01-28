@extends('admin_layout')
@section('addCategoryPrdoduct')

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Thêm danh mục sản phẩm
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
        <form role="form" action="{{URL::to('/sc_admin/save-categoryproduct')}}" method="post">  
            {{ csrf_field() }}
        <div class="intro-y box p-5">
            <div>
                <label>Tên danh mục</label>
                <input type="text" name="category_product_name" id="categoryName" class="input w-full border mt-2" placeholder="Nhập tên danh mục">
            </div>
           
            
            <div class="mt-3">
                <label>Mô tả danh mục</label>
                <div class="mt-2">
                    <textarea placeholder="Nhập nội dung mô tả về danh mục" class="summernote" name="category_product_desc" id="categoryDescription"></textarea>
                </div>
            </div>

            <div class="sm:mt-2">Hiện thị
                <select name="category_product_status" class="input input--sm border mr-2">
                    <option value="0">Ẩn</option>
                    <option value="1">Hiển thị</option>
                </select>
            </div>

            <div class="text-right mt-5">
                <button  type="submit" name="add_category_product" type="button" class="button w-40 bg-theme-1 text-white">Thêm danh mục</button>
            </div>
        </div>
        </form>
        <!-- END: Form Layout -->
    </div>
</div>

@endsection
