@extends('admin_layout')
@section('allBrandPrdoduct')

<h2 class="intro-y text-lg font-medium mt-10">
  Danh sách thương hiệu
</h2>

<div class="grid grid-cols-12 gap-6 mt-5">
  <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
      <button class="button text-white bg-theme-1 shadow-md mr-2"><a href="{{URL::to('/sc_admin/add-brandproduct')}}"> Thêm mới thương hiệu</a></button>
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
              <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
              <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i> 
          </div>
      </div>
  </div>
  <!-- BEGIN: Data List -->
  <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
      <table class="table table-report -mt-2">
          <thead>
              <tr>
                  <th class="whitespace-no-wrap">Tên thương hiệu</th>
                  <th class="whitespace-no-wrap">Hiển thị</th>
                  <th class="whitespace-no-wrap" style="width:30px;"></th>
              </tr>
          </thead>
          <tbody>

            @foreach($all_brandproduct as $key => $cate_pro)
              <tr class="intro-x">
                  <td>
                      <a href="" class="font-medium whitespace-no-wrap">{{ $cate_pro->brand_name }}</a> 
                      <div class="text-gray-600 text-xs whitespace-no-wrap">@php echo $cate_pro->brand_desc; @endphp</div>
                  </td>
                  <td class="w-40">

                    <?php
                      if($cate_pro->brand_status==0){
                        ?>
                          <div class="text-center flex items-center justify-center text-theme-6"> 
                            <a href="{{URL::to('/sc_admin/active-brandproduct/'.$cate_pro->brand_id)}}"><i data-feather="check-square" class="w-4 h-4 mr-2"></i>  Không hiển thị</a>  
                          </div>
                        <?php
                      }else{
                        ?>
                          <div class="text-center flex items-center justify-center text-theme-9"> 
                            <a href="{{URL::to('/sc_admin/unactive-brandproduct/'.$cate_pro->brand_id)}}"><i data-feather="check-square" class="w-4 h-4 mr-2"></i>  Hiển thị</a>  
                          </div>
                        <?php
                      }
                    ?>

                  </td>
                  <td class="table-report__action w-56">
                      <div class="flex justify-center items-center">
                          <a class="flex items-center mr-3" href="{{URL::to('/sc_admin/edit-brandproduct/'.$cate_pro->brand_id)}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Sửa </a>
                          <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Xoá </a>
                      </div>
                  </td>
              </tr>
              @endforeach

          </tbody>
      </table>
  </div>
  <!-- END: Data List -->
  <!-- BEGIN: Pagination -->
  <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
      <ul class="pagination">
          <li>
              <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
          </li>
          <li>
              <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
          </li>
          <li> <a class="pagination__link" href="">...</a> </li>
          <li> <a class="pagination__link pagination__link--active" href="">1</a> </li>
          <li> <a class="pagination__link " href="">2</a> </li>
          <li> <a class="pagination__link" href="">3</a> </li>
          <li> <a class="pagination__link" href="">...</a> </li>
          <li>
              <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
          </li>
          <li>
              <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
          </li>
      </ul>
      <div class="hidden md:block mx-right text-gray-600">Showing 1 to 10 of 150 entries</div>
     
  </div>
  <!-- END: Pagination -->
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
     
          <button type="button" class="button w-24 bg-theme-6 text-white"><a href="{{URL::to('/sc_admin/delete-brandproduct/'.$cate_pro->brand_id)}}">Xoá luôn</a></button>
   
        </div>
  </div>
</div>
<!-- END: Delete Confirmation Modal -->

@endsection
