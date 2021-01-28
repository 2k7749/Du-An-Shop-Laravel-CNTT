@extends('admin_layout')
@section('allBrandPrdoduct')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Sửa thương hiệu sản phẩm
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
        @foreach ($edit_brandproduct as $item => $edit_value)
            <form role="form" action="{{URL::to('/sc_admin/update-brandproduct/'.$edit_value->brand_id)}}" method="post">  
                {{ csrf_field() }}
                <div class="intro-y box p-5">
                    <div>
                        <label>Tên thương hiệu</label>
                        <input type="text" value="{{$edit_value -> brand_name}}" name="brand_product_name" id="categoryName" class="input w-full border mt-2" placeholder="Nhập tên thương hiệu">
                    </div>
                
                    
                    <div class="mt-3">
                        <label>Mô tả thương hiệu</label>
                        <div class="mt-2">
                            <textarea placeholder="Nhập nội dung mô tả về thương hiệu" class="summernote" name="brand_product_desc" id="categoryDescription">@php echo $edit_value->brand_desc; @endphp</textarea>
                        </div>
                    </div>

                    <div class="sm:mt-2">Hiện thị
                        <select name="brand_product_status" class="input input--sm border mr-2">
                            @if ($edit_value ->brand_status == 1)
                                    <option value="1" selected="selected">Hiển thị</option>
                                @else
                                    <option value="0">Ẩn</option>
                            @endif
                        </select>
                    </div>

                    <div class="text-right mt-5">
                        <button  type="submit" name="update_brand_product" type="button" class="button w-40 bg-theme-1 text-white">Cập nhập thương hiệu</button>
                    </div>
                </div>
            </form>
        @endforeach
        <!-- END: Form Layout -->
    </div>
</div>
@endsection
