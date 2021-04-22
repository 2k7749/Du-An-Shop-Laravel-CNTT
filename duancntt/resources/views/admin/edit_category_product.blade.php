@extends('admin_layout')
@section('allCategoryPrdoduct')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Sửa danh mục sản phẩm
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
        @foreach ($edit_categoryproduct as $item => $edit_value)
            <form role="form" action="{{URL::to('/sc_admin/update-categoryproduct/'.$edit_value->category_id)}}" method="post" enctype="multipart/form-data">  
                {{ csrf_field() }}
                <div class="intro-y box p-5">
                    <div>
                        <label>Tên danh mục</label>
                        <input type="text" value="{{$edit_value -> category_name}}" name="category_product_name" id="categoryName" class="input w-full border mt-2" placeholder="Nhập tên danh mục">
                    </div>
                
                    
                    <div class="mt-3">
                        <label>Mô tả danh mục</label>
                        <div class="mt-2">
                            <textarea placeholder="Nhập nội dung mô tả về danh mục" class="summernote" name="category_product_desc" id="categoryDescription">@php echo $edit_value->category_desc; @endphp</textarea>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label>Action</label>
                        <div class="mt-2">
                            <textarea placeholder="" class="summernote" name="category_action" id="categoryaction">@php echo $edit_value->category_action; @endphp</textarea>
                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="form-group note-form-group note-group-select-from-files">
                            <label >Hình ảnh sản phẩm</label>
                            <input class="input w-full border mt-2" value="{{$edit_value->category_image}}" type="file" name="category_image">
                            <img src="/public/upload/category/{{ $edit_value->category_image}}" alt="" height="100px" width="120px">
                        </div>
                    </div>

                    <div class="sm:mt-2">Hiển thị
                        <select name="category_product_status" class="input input--sm border mr-2">
                            @if ($edit_value ->category_status == 1)
                                    <option value="1" selected="selected">Hiển thị</option>
                                @else
                                    <option value="0">Ẩn</option>
                            @endif
                        </select>
                    </div>

                    <div class="text-right mt-5">
                        <button  type="submit" name="update_category_product" type="button" class="button w-40 bg-theme-1 text-white">Cập nhập danh mục</button>
                    </div>
                </div>
            </form>
        @endforeach
        <!-- END: Form Layout -->
    </div>
</div>
@endsection
