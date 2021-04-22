@extends('admin_layout')
@section('allCategoryPrdoduct')

<h2 class="intro-y text-lg font-medium mt-10">
  Thông tin người mua
</h2>

<div class="grid grid-cols-12 gap-6 mt-5">
  <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
      
      <div class="hidden md:block mx-auto text-red-600">
            @php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message',null);
                }
          @endphp
      </div>
      
  </div>
  <!-- BEGIN: Data List -->
  <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
      <table class="table table-report -mt-2">
          <thead>
              <tr>
                  <th class="whitespace-no-wrap">Tên người mua</th>
                  <th class="whitespace-no-wrap">Số điện thoại</th>
                  <th class="whitespace-no-wrap">Ghi chú</th>
              </tr>
          </thead>
          <tbody>

              <tr class="intro-x">
                  <td>
                      <span class="font-medium whitespace-no-wrap">{{$cus_order_by_id->customer_name}}</span> 
                  </td>

                  <td>
                    <span class="font-medium whitespace-no-wrap">{{$cus_order_by_id->customer_phone}}</span> 
                  </td>

                  <td>
                    <span class="font-medium whitespace-no-wrap">{{$cus_order_by_id->shipping_note}}</span> 
                  </td>
              </tr>

          </tbody>
      </table>
  </div>
  <!-- END: Data List -->
</div>


<br>
<br>
<h2 class="intro-y text-lg font-medium mt-10">
    Thông tin vận chuyển
  </h2>
  
  <div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        
        <div class="hidden md:block mx-auto text-red-600">
              @php
                  $message = Session::get('message');
                  if ($message) {
                      echo $message;
                      Session::put('message',null);
                  }
            @endphp
        </div>
        
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-no-wrap">Tên người nhận</th>
                    <th class="whitespace-no-wrap">Địa chỉ</th>
                    <th class="whitespace-no-wrap">Số điện thoại</th>
                    <th class="whitespace-no-wrap">Email</th>
                </tr>
            </thead>
            <tbody>
  
                <tr class="intro-x">
                    <td>
                        <span class="font-medium whitespace-no-wrap">{{$cus_order_by_id->shipping_name}}</span> 
                    </td>
  
                    <td>
                        <span class="font-medium whitespace-no-wrap">{{$cus_order_by_id->shipping_address}}</span> 
                    </td>

                    <td>
                        <span class="font-medium whitespace-no-wrap">{{$cus_order_by_id->shipping_phone}}</span> 
                    </td>

                    <td>
                        <span class="font-medium whitespace-no-wrap">{{$cus_order_by_id->shipping_email}}</span> 
                    </td>
                   
                </tr>
  
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
  </div>


<!-- BEGIN: Delete Confirmation Modal -->
<div class="modal" id="delete-confirmation-modal">
  <div class="modal__content">
      <div class="p-5 text-center">
          <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i> 
          <div class="text-3xl mt-5">Bạn chắc chắn muốn xoá chứ ?</div>
          <div class="text-gray-600 mt-2">Muốn xoá ấn nút Xoá bên dưới.</div>
      </div>
      <div class="px-5 pb-8 text-center">
          <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Huỷ</button>
     
          <button type="button" class="button w-24 bg-theme-6 text-white"><a href="">Xoá luôn</a></button>
   
        </div>
  </div>
</div>
<!-- END: Delete Confirmation Modal -->



<br>
<br>
<br>
<h2 class="intro-y text-lg font-medium mt-10">
    Chi tiết đơn hàng
  </h2>
  
  <div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        
        <div class="hidden md:block mx-auto text-red-600">
              @php
                  $message = Session::get('message');
                  if ($message) {
                      echo $message;
                      Session::put('message',null);
                  }
            @endphp
        </div>
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-no-wrap">Tên sản phẩm</th>
                    <th class="whitespace-no-wrap">Số lượng</th>
                    <th class="whitespace-no-wrap">Giá</th>
                    <th class="whitespace-no-wrap">Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
  
                @foreach ($order_by_id as $item=>$product)
                <tr class="intro-x">
                    <td>
                        <p href="" class="font-medium whitespace-no-wrap">{{$product->product_name}}</p> 
                    </td>
  
                    <td>
                        <p href="" class="font-medium whitespace-no-wrap">{{$product->product_sales_quantity}}</p> 
                    </td>

                    <td>
                        <p href="" class="font-medium whitespace-no-wrap">{{$product->product_price}}</p> 
                    </td>

                    <td>
                        <p href="" class="font-medium whitespace-no-wrap">{{$product->product_price*$product->product_sales_quantity}}</p> 
                    </td>
                </tr>
                @endforeach
  
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
  </div>
  <!-- BEGIN: Delete Confirmation Modal -->
  <div class="modal" id="delete-confirmation-modal">
    <div class="modal__content">
        <div class="p-5 text-center">
            <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i> 
            <div class="text-3xl mt-5">Bạn chắc chắn muốn xoá chứ ?</div>
            <div class="text-gray-600 mt-2">Muốn xoá ấn nút Xoá bên dưới.</div>
        </div>
        <div class="px-5 pb-8 text-center">
            <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Huỷ</button>
       
            <button type="button" class="button w-24 bg-theme-6 text-white"><a href="">Xoá luôn</a></button>
     
          </div>
    </div>
  </div>
  <!-- END: Delete Confirmation Modal -->

@endsection
