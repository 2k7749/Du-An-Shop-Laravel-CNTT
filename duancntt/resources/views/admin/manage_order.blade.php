@extends('admin_layout')
@section('allCategoryPrdoduct')

<h2 class="intro-y text-lg font-medium mt-10">
  Đơn hàng đã đặt mua
</h2>

<div class="grid grid-cols-12 gap-6 mt-5">
  <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
      <button class="button text-white bg-theme-1 shadow-md mr-2"><a href="">Thêm mới đơn</a></button>
      <div class="dropdown relative">
          <button class="dropdown-toggle button px-2 box text-gray-700">
              <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
          </button>
          <div class="dropdown-box mt-10 absolute w-40 top-0 left-0 z-20">
              <div class="dropdown-box__content box p-2">
                  <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a>
                  <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                  <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
              </div>
          </div>
      </div>
      <div class="hidden md:block mx-auto text-red-600">
            @php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message',null);
                }
          @endphp
      </div>
      <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
          <div class="w-56 relative text-gray-700">
              <input type="text" class="input w-56 box pr-10 placeholder-theme-13" id="search_id_order" placeholder="Tìm theo mã đơn hàng">
              <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i> 
          </div>
      </div>
  </div>
  <!-- BEGIN: Data List -->
  <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
      <table class="table table-report -mt-2">
          <thead>
              <tr>
                  <th class="whitespace-no-wrap">Người đặt hàng</th>
                  <th class="whitespace-no-wrap">Tổng giá trị</th>
                  <th class="whitespace-no-wrap">Trạng thái đơn</th>
                  <th class="whitespace-no-wrap">Trạng thái thanh toán</th>
                  <th class="whitespace-no-wrap" style="width:30px;"></th>
              </tr>
          </thead>
          <tbody>

            @foreach($all_order as $key => $order)
              <tr class="intro-x">
                  <td>
                      <p href="" class="font-medium whitespace-no-wrap">{{ $order->customer_name }}</p> 
                  </td>

                  <td>
                    <p href="" class="font-medium whitespace-no-wrap">{{ $order->order_total }}</p> 
                  </td>
                  <td>
                    <p href="" class="font-medium whitespace-no-wrap">{{ $order->order_status }}</p> 
                  </td>
                  <td>
                    <p href="" class="font-medium whitespace-no-wrap">{{ $order->payment_status }}</p> 
                  </td>
                  <td class="table-report__action w-56">
                      <div class="flex justify-center items-center">
                          <a class="flex items-center mr-3" href="{{URL::to('/sc_admin/view-order/'.$order->order_id)}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Xem chi tiết đơn hàng </a>
                          <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Xoá </a>
                      </div>
                  </td>
              </tr>
              @endforeach

          </tbody>
      </table>
  </div>
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
            {{-- <button type="button" class="button w-24 bg-theme-6 text-white"><a href="{{URL::to('/sc_admin/delete-order/'.$order->order_id)}}">Xoá luôn</a></button> --}}
        </div>
  </div>
</div>
<!-- END: Delete Confirmation Modal -->

@endsection