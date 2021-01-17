@extends('admin_layout')
@section('allBrandPrdoduct')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa thương hiệu sản phẩm
                </header>
                @php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span style="text-align: center;color: red;width: 100%;">',$message,'</span>';
                        Session::put('message',null);
                    }
                @endphp
                <div class="panel-body">

                    @foreach ($edit_brandproduct as $item => $edit_value)

                    <div class="position-center">
                        <form role="form" action="{{URL::to('/sc_admin/update-brandproduct/'.$edit_value->brand_id)}}" method="post">  
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="brandName">Tên thương hiệu</label>
                                <input type="text" value="{{$edit_value -> brand_name}}" class="form-control" name="brand_product_name" id="brandName" placeholder="Enter name brand">
                            </div>
                            <div class="form-group">
                                <label for="brandDescription">Mô tả thương hiệu</label>
                                <textarea style="resize: none" rows="8" type="password" class="form-control" name="brand_product_desc" id="brandDescription">{{$edit_value -> brand_desc}}</textarea>
                            </div>
                          
                            <button type="submit" name="update_brand_product" class="btn btn-info" >Cập nhập thương hiệu</button>
                        </form>
                    </div>

                    @endforeach

                </div>
            </section>
        </div>
    </div>
</div>
@endsection
