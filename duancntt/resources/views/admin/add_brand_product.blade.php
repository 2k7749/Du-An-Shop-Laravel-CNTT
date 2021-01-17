@extends('admin_layout')
@section('addBrandPrdoduct')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
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
                        <form role="form" action="{{URL::to('/sc_admin/save-brandproduct')}}" method="post">  
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="brandName">Tên thương hiệu</label>
                                <input type="text" class="form-control" name="brand_product_name" id="brandName" placeholder="Enter name brand">
                            </div>
                            <div class="form-group">
                                <label for="brandDescription">Mô tả thương hiệu</label>
                                <textarea style="resize: none" rows="8" type="password" class="form-control" name="brand_product_desc" id="brandDescription" placeholder="Mô tả thương hiệu"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hiện thị</label>
                                <select name="brand_product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_brand_product" class="btn btn-info" >Thêm thương hiệu</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
