@extends('layoutdetails')
@section('contentdetails')

   <section class="sec-product-detail bg0 p-t-65 p-b-60">
    @foreach ($product_detail as $item=>$product)
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="{{URL::to('public/upload/product/'.$product->product_image)}}">
									<div class="wrap-pic-w pos-relative">
										<img src="{{URL::to('public/upload/product/'.$product->product_image)}}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{URL::to('public/upload/product/'.$product->product_image)}}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							{{$product->product_name}}
						</h4>

						<span class="mtext-106 cl2">
							{{number_format($product->product_price).' VNĐ'}}
						</span>

						<p class="stext-102 cl3 p-t-23">
							{{($product->product_content)}}
						</p>
						
						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									<p>Tình trạng:</p>
								</div>

								<div class="size-204 respon6-next">
										<p>Còn hàng</p>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									<p>Brand:</p>
								</div>

								<div class="size-204 respon6-next">
									{{' '.$product->brand_name}}
								</div>
                            </div>
                            
                            <div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									<p>Danh mục:</p>
								</div>

								<div class="size-204 respon6-next">
									{{' '.$product->category_name}}
								</div>
							</div>


                            <span>
								{{-- action="{{URL::to('/save-cart')}}" method="POST" --}}
                            {{-- <form> --}}
                                {{-- {{csrf_field()}} --}}
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <input name="productid_hidden" id="pID" type="hidden" value="{{$product->product_id}}" />
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>
                                            <input class="mtext-104 cl3 txt-center num-product" type="number" id="qty" name="qty" value="1">
                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
    
                                        <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" id="add-to-cart">
                                            Add to cart
                                        </button>
                                    </div>
                                </div>	
                            {{-- </form> --}}
						</div>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									{{$product->product_desc}}
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Weight
											</span>

											<span class="stext-102 cl6 size-206">
												0.79 kg
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Dimensions
											</span>

											<span class="stext-102 cl6 size-206">
												110 x 33 x 100 cm
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Materials
											</span>

											<span class="stext-102 cl6 size-206">
												60% cotton
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Color
											</span>

											<span class="stext-102 cl6 size-206">
												Black, Blue, Grey, Green, Red, White
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Size
											</span>

											<span class="stext-102 cl6 size-206">
												XL, L, M, S
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- - -->
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				SKU: JAK-01
			</span>

			<span class="stext-107 cl6 p-lr-25">
				Categories: Jacket, Men
			</span>
        </div>
        @endforeach
	</section>

	<script>
		$('#add-to-cart').click(function (e){
			e.preventDefault();
			var nameProduct = $('.js-name-detail').text();
			var product_ID = $('#pID').val();
			var sl = $('#qty').val();

			$.post('/add-to-cart-ajax', {_token: "{{csrf_token()}}",'productId': product_ID, 'quantity': sl}, function (data,countItem) {

				var total = 0;
				swal(nameProduct, "is added to cart !", "success").then(()=>{

					//reset item cart
					$("#ul-item-cart").empty();
					
					var c = Object.keys(JSON.parse(data)).length;

					// count quantity
					$('#qwerty #qty-show').replaceWith('<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="qty-show" data-notify="'+c+'"><i class="zmdi zmdi-shopping-cart"></i></div>');
					//item cart
					$.each(JSON.parse(data), function( key, value ) {
						$("#ul-item-cart").append(' <li class="header-cart-item flex-w flex-t m-b-12" id="list-item-cart"> ' +
								'<div class="header-cart-item-img">' +
									'<img src="../public/upload/product/'+value['options']['image']+'" alt="IMG"  width="60px" height="80px">' +
								'</div>' +

								'<div class="header-cart-item-txt p-t-8">' +
									'<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">' +
										''+value['name']+'' +
									'</a>' +

									'<span class="header-cart-item-info">' +
										''+value['qty']+' x '+value['price'].toLocaleString()+' VNĐ ' +
									'</span>' +
								'</div>'+

							'</li>'
						);

						total += value['price']*value['qty']
					});

					$('#cart-total').replaceWith('<div class="header-cart-total w-full p-tb-40" id="cart-total">Total: '+total.toLocaleString('en-US')+' VNĐ '+'</div>');

				});
			});	
		});
	</script>

	<script>
		$('#qwerty').on('click', '.js-show-cart', function(e) {
			e.preventDefault();
			$('.js-panel-cart').addClass('show-header-cart');
		});
	</script>

@endsection