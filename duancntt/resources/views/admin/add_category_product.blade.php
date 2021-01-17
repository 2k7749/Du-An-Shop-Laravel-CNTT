@extends('admin_layout')
@section('addCategoryPrdoduct')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm
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
                        <form role="form" action="{{URL::to('/sc_admin/save-categoryproduct')}}" method="post">  
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="categoryName">Tên danh mục</label>
                                <input type="text" class="form-control" name="category_product_name" id="categoryName" placeholder="Enter name category">
                            </div>
                            <div class="form-group">
                                <label for="categoryDescription">Mô tả danh mục</label>
                                <textarea style="resize: none" rows="8" type="password" class="form-control" name="category_product_desc" id="categoryDescription" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hiện thị</label>
                                <select name="category_product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info" >Them danh muc</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
