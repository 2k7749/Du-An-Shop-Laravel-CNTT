@extends('layout_product')
@section('allProduct')
    <!-- Product -->
	<section class="bg0 p-t-23 p-b-140" id="show-now">
		<div class="container">

			<div class="flex-w flex-sb-m p-b-52"> 
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>
					
					@foreach ($category as $item =>$category)
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{$category->category_id}}">
							{{$category->category_name}}
						</button>
					@endforeach
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Brand
							</div>

							<div class="flex-w p-t-4 m-r--5">
								@foreach ($brand as $item=>$brand)
									<li><a class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5" href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right">(50)</span>{{$brand->brand_name}}</a></li>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row isotope-grid">    

				{{-- sản phẩm --}}
				
                @foreach ($product as $item=>$product)
                <form action="{{URL::to('/add-to-cart')}}" method="POST">
                   {{csrf_field()}}
                   <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product->category_id}}">
                      <!-- Block2 -->
                      <div class="block2">
                         <div class="block2-pic hov-img0">
                            <img src="{{('public/upload/product/').$product->product_image}}" width="231px" height="285px" alt="IMG-PRODUCT">
             
                            <button type="submit" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" id="add-to-cart">
                               Add to cart
                            </button>
                         </div>
             
                         <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                               <input name="productid_hidden" type="hidden" value="{{$product->product_id}}" />
                               <input class="mtext-104 cl3 txt-center num-product" type="hidden" name="qty" id="qty" value="1">
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

			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</section>

	<script>
		$('#add-to-cart').click(function (e){
			e.preventDefault();
			var nameProduct = $('.js-addcart-detail').parent().parent().parent().parent().find('.js-name-detail').html();
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

						$('#cart-total').replaceWith('<div class="header-cart-total w-full p-tb-40" id="cart-total">Total: '+total.toLocaleString()+' VNĐ '+'</div>');

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