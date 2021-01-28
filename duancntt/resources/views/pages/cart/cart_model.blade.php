{{-- @extends('layoutdetails')
@section('contentdetails')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Hình ảnh</td>
                            <td class="description">Mô tả</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Tổng tiền</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach (Cart::content() as $item)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{('../public/upload/product/').$item->options->image}}" alt="" width="60px"></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{$item->name}}</a></h4>
                                    <p>Web ID: 1089772</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{number_format($item->price).' VNĐ'}}</p>
                                </td>
                                <td class="cart_quantity">
                                        <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                            {{csrf_field()}}
                                            <input class="cart_quantity_input" type="text" name="quantity_cart" value="{{$item->qty}}">
                                            <input class="form-control" type="hidden" name="rowId_cart" value="{{$item->rowId}}">
                                            <input class="btn btn-default btn-sm" type="submit" name="update_qty" value="cập nhập">
                                        </form>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{number_format($item->qty * $item->price).' vnđ'}}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$item->rowId)}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">     <!--/#chọn khu vực-->
					<div class="chose_area">
						{{-- <ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul> --}}
						{{-- <ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a> --}}
					{{-- </div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::total().' '.'VNĐ'}}</span></li>
							<li>Eco Tax <span>{{Cart::tax().' '.'VNĐ'}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::subtotal().' '.'VNĐ'}}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
    </section><!--/#do_action-->
    
@endsection  --}}