@extends('layout')
@section('content')

<!--Items-->

@foreach ($product as $item=>$product)

<form action="{{URL::to('/add-to-cart')}}" method="POST">
   {{csrf_field()}}
<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
   <!-- Block2 -->
   <div class="block2">
   <div class="block2-pic hov-img0">
      <img src="{{('public/upload/product/').$product->product_image}}" width="231px" height="285px" alt="IMG-PRODUCT">

      <button type="submit" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
         Add to cart
      </button>
   </div>

   <div class="block2-txt flex-w flex-t p-t-14">
      <div class="block2-txt-child1 flex-col-l ">
         <input name="productid_hidden" type="hidden" value="{{$product->product_id}}" />
         <input class="mtext-104 cl3 txt-center num-product" type="hidden" name="qty" value="1">
         <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
            {{$product->product_name}}
         </a>

         <span class="stext-105 cl3">
            {{number_format($product->product_price).' VNĐ'}}
         </span>
      </div>

      <div class="block2-txt-child2 flex-r p-t-3">
         <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
            <img class="icon-heart1 dis-block trans-04" src="{{asset('public/frontend/images/icons/icon-heart-01.png')}}" alt="ICON">
            <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('public/frontend/images/icons/icon-heart-02.png')}}" alt="ICON">
         </a>
      </div>
   </div>
</div>
</div>
</form>
@endforeach

@endsection