@extends('layout_cart')
@section('contentdetails')
 <!-- Shoping Cart -->
 <div class="bg0 p-t-75 p-b-85">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<thead>
								<tr class="table_head">
									<th class="column-1">Product</th>
										<th class="column-2"></th>
										<th class="column-3">Price</th>
										<th class="column-4">Quantity</th>
										<th class="column-5">Total</th>
										<th class="column-6"></th>
								</tr>
							</thead>

							<tbody>

								@php
								$message = Session::get('message');
								if ($message) {
									echo '<center><span style="text-align: center;color: red;width: 100%; text-align: center;">',$message,'</span></center>';
									Session::put('message',null);
								}
								@endphp

								@foreach (Cart::content() as $item)
								<tr class="table_row">
										<td class="column-1">
											<div class="how-itemcart1">
												<img src="{{('../public/upload/product/').$item->options->image}}" alt="" width="60px">
											</div>
										</td>
										<td class="column-2">{{$item->name}}</td>
										<td class="column-3">{{number_format($item->price).' VNĐ'}}</td>
										<td class="column-4">
											{{-- <form action="{{URL::to('/update-cart-quantity')}}" method="POST"> --}}
											<form method="POST">
												{{csrf_field()}}
												<input class="form-control" type="hidden" name="rowId_cart" id="rowId_cart" value="{{$item->rowId}}">
												<div class="wrap-num-product flex-w m-l-auto m-r-0">
													<div class="btn-num-product-down-cart cl8 hov-btn3 trans-04 flex-c-m" data-id="{{$item->rowId}}">
														<i class="fs-16 zmdi zmdi-minus"></i>
													</div>

													<input class="mtext-104 cl3 txt-center num-product"  type="text" id="quantity_cart" name="quantity_cart" value="{{$item->qty}}">
		
													<div class="btn-num-product-up-cart cl8 hov-btn3 trans-04 flex-c-m"  data-id="{{$item->rowId}}">
														<i class="fs-16 zmdi zmdi-plus"></i>
													</div>
												</div>
											</form>
										</td>
										<td class="column-5" id="{{$item->rowId}}">{{number_format($item->qty * $item->price).' vnđ'}}</td>
										<td class="cart_delete column-6">
											<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$item->rowId)}}"><i class="fa fa-times"></i></a>
										</td>
									</tr>
								@endforeach
							</tbody>
							
						</table>
					</div>

				</div>
			</div>

			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Cart Totals
					</h4>

					<div class="flex-w flex-t bor12 p-b-13">
						<div class="size-208">
							<span class="stext-110 cl2">
								Subtotal:
							</span>
						</div>

						<div class="size-209 total-cart">
							<span class="mtext-110 cl2">
								{{Cart::subtotal(0,'.',',') .' '.'VNĐ'}}
							</span>
						</div>
					</div>
					<?php 
							$customer_id = Session::get('customer_id');
							$shipping_id = Session::get('shipping_id');
							 if ($customer_id!=null &&$shipping_id==null) { ?>
								<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
									<a href="{{URL::to('/checkout')}}" style="color: #ffffff">Proceed to Checkout</a>
								</button>
						<?php }else{ ?>
							<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
								<a href="{{URL::to('/login-checkout')}}"style="color: #ffffff">Proceed to Checkout</a>
							</button>
						<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

	$('.btn-num-product-down-cart').on('click', function(e){
        var numProduct = Number($(this).next().val());
        if(numProduct > 1){
			$(this).next().val(numProduct - 1);
			
			var qty = $(this).next().val();
			var rowId_cart = $(this).data("id");
			setTimeout(function(){ 
				update_cart(rowId_cart,qty);
			}, 100);
		}
    });

    $('.btn-num-product-up-cart').on('click', function(e){
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);

		var qty = $(this).prev().val();
		var rowId_cart =$(this).data("id");
		setTimeout(function(){ 
			update_cart(rowId_cart,qty);
		}, 100);
    });

	function update_cart(rowID, qty) {

		var subTotal = 0;
		$.post('/update-cart-quantity-ajax', {_token: "{{csrf_token()}}",'rowId_cart': rowID, 'quantity_cart': qty}, function (data) {
			// var obj = JSON.parse(data);
			// var id = '#'+rowID;
			// var total = obj.price * obj.qty;
			// $(id).replaceWith(' <td class="column-5" id="'+rowID+'">'+total.toLocaleString()+' VNĐ '+'</td>');
			$.each(JSON.parse(data), function( key, value ) {
				if (value['rowId'] == rowID) {
					var id = '#'+rowID;
					var total =value['price'] *value['qty'];
					$(id).replaceWith(' <td class="column-5" id="'+rowID+'">'+total.toLocaleString()+' VNĐ '+'</td>');
				}

				subTotal += value['price']*value['qty']
			});
			$('.total-cart').replaceWith(' <div class="size-209 total-cart"> <span class="mtext-110 cl2"> '+subTotal.toLocaleString('en-US')+ ' VNĐ '+ ' </span> </div> ');
		});	
	}

</script>

@endsection
