@extends('admin_layout')
@section('allCategoryPrdoduct')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa danh mục sản phẩm
                </header>
                @php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span style="text-align: center;color: red;width: 100%;">',$message,'</span>';
                        Session::put('message',null);
                    }
                @endphp
                <div class="panel-body">

                    @foreach ($edit_categoryproduct as $item => $edit_value)

                    <div class="position-center">
                        <form role="form" action="{{URL::to('/sc_admin/update-categoryproduct/'.$edit_value->category_id)}}" method="post">  
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="categoryName">Tên danh mục</label>
                                <input type="text" value="{{$edit_value -> category_name}}" class="form-control" name="category_product_name" id="categoryName" placeholder="Enter name category">
                            </div>
                            <div class="form-group">
                                <label for="categoryDescription">Mô tả danh mục</label>
                                <textarea style="resize: none" rows="8" type="password" class="form-control" name="category_product_desc" id="categoryDescription">{{$edit_value -> category_desc}}</textarea>
                            </div>
                          
                            <button type="submit" name="update_category_product" class="btn btn-info" >Cập nhập danh mục</button>
                        </form>
                    </div>

                    @endforeach

                </div>
            </section>
        </div>
    </div>
</div>
@endsection
