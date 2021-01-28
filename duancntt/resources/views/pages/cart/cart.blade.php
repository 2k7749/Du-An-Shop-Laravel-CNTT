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
											<form action="{{URL::to('/update-cart-quantity')}}" method="POST">
												{{csrf_field()}}
												<div class="wrap-num-product flex-w m-l-auto m-r-0">
													<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
														<i class="fs-16 zmdi zmdi-minus"></i>
													</div>
													<input class="mtext-104 cl3 txt-center num-product"  type="text" name="quantity_cart" value="{{$item->qty}}">
		
													<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
														<i class="fs-16 zmdi zmdi-plus"></i>
													</div>
												</div>
												<div class="wrap-num-product1 flex-w m-l-auto">
													<input class="form-control" type="hidden" name="rowId_cart" value="{{$item->rowId}}">
													<input class="btn btn-default btn-sm" type="submit" name="update_qty" value="cập nhập">
												</div>
											</form>
										</td>
										<td class="column-5">{{number_format($item->qty * $item->price).' vnđ'}}</td>
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

						<div class="size-209">
							<span class="mtext-110 cl2">
								{{Cart::total().' '.'VNĐ'}}
							</span>
						</div>
					</div>

					<div class="flex-w flex-t bor12 p-t-15 p-b-30">
						<div class="size-208 w-full-ssm">
							<span class="stext-110 cl2">
								Shipping:
							</span>
						</div>

						<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
							<p class="stext-111 cl6 p-t-2">
								There are no shipping methods available. Please double check your address, or contact us if you need any help.
							</p>
							
							<div class="p-t-15">
								<span class="stext-112 cl8">
									Calculate Shipping
								</span>

								<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
									<select class="js-select2" name="time">
										<option>Select a country...</option>
										<option>USA</option>
										<option>UK</option>
									</select>
									<div class="dropDownSelect2"></div>
								</div>

								<div class="bor8 bg0 m-b-12">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
								</div>

								<div class="bor8 bg0 m-b-22">
									<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
								</div>
								
								<div class="flex-w">
									<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
										Update Totals
									</div>
								</div>
									
							</div>
						</div>
					</div>
					<div class="flex-w flex-t p-t-27 p-b-33">
						<div class="size-208">
							<span class="mtext-101 cl2">
								Total:
							</span>
						</div>

						<div class="size-209 p-t-1">
							<span class="mtext-110 cl2">
								{{Cart::subtotal().' '.'VNĐ'}}
							</span>
						</div>
					</div>



					<?php 
							$customer_id = Session::get('customer_id');
							$shipping_id = Session::get('shipping_id');
							 if ($customer_id!=null &&$shipping_id==null) { ?>
								<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
									<a href="{{URL::to('/checkout')}}">Proceed to Checkout</a>
								</button>
								<?php }else if ($customer_id!=null &&$shipping_id!=null){ ?>
									<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
										<a href="{{URL::to('/payment')}}">Proceed to Checkout</a>
									</button>
						<?php }else{ ?>
							<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
								<a href="{{URL::to('/login-checkout')}}">Proceed to Checkout</a>
							</button>
						<?php } ?>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
