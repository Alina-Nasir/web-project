@extends('master')
<head>
<meta name='csrf-token' content='{{ csrf_token()}}'>
</head>
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
		
	<div class="header2">
      <div class="container-header">
        <div class="navbar">
          <div class="logo">
            <img src="{{url('images/logo.svg')}}" alt="RedStore Logo" width="125px" />
          </div>
          <nav>
            <ul id="MenuItems">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li><a href="{{ url('/men') }}">Men</a></li>
              <li><a href="{{ url('/women') }}">Women</a></li>
              <li><a href="{{ url('/boys') }}">Boys</a></li>
			  <li><a href="{{ url('/girls') }}">Girls</a></li>
              <li><a href="">Contact</a></li>
              @if (Route::has('login'))
              @auth
              <li><a href="{{ url('/home') }}">Account</a></li>
              @else
              <li><a href="{{ route('login') }}">Account</a></li>
              @endauth
              @endif
            </ul>
          </nav>
          <a href=""><img
            src="{{url('images/cart.png')}}"
            alt="Shopping cart icon"
            width="30px"
            height="30px"
          /></a>
        </div>
      </div>
	  <!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html">Shop Grid</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
    </div>
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
                        @php $total="0" @endphp
                        @if(isset($cart_data))
                         @if(Cookie::get('shopping_cart'))
                         
    
                         @foreach ($cart_data as $data)
                         @php $item_total="0" @endphp
							<tr class='cartpage'>
								<td class="image" data-title="No"><img src="{{url('/images/'.$data['item_image'])}}" alt="#"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="#">{{ $data['item_name'] }}</a></p>
									<p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p>
								</td>
								<td class="price" data-title="Price"><span>${{$data['item_price']}} </span></td>
								<td class="qty" data-title="Qty"><!-- Input Order -->
                                <input type="hidden" class="product_id" value="{{ $data['item_id'] }}" >
									<div class="quantity input-group">
										<div class="button minus">
											<button type="button" class="changeQuantity btn btn-primary btn-number" data-type="minus" data-field="{{$data['item_name']}}">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="{{$data['item_name']}}" class="qty-input input-number"  data-min="1" data-max="100" value="{{$data['item_quantity']}}">
										<div class="button plus">
											<button type="button" class="changeQuantity btn btn-primary btn-number" data-type="plus" data-field="{{$data['item_name']}}">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div>
									<!--/ End Input Order -->
								</td>
                                @php $item_total = ($data["item_quantity"] * $data["item_price"]) @endphp
								<td class="total-amount" data-title="Total"><span>${{$data["item_quantity"] * $data["item_price"]}}</span></td>
								<td class="action" data-title="Remove"><a href="#" class='delete_cart_data'><i class="ti-trash remove-icon"></i></a></td>
                                @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
							</tr>
                            @endforeach
                          @endif
                          @endif

						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
										<form action="#" target="_blank">
											<input name="Coupon" placeholder="Enter Your Coupon">
											<button class="btn">Apply</button>
										</form>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal<span>${{$total}}</span></li>
										<li>Shipping<span>Free</span></li>
										<li>You Save<span>$0.00</span></li>
										<li class="last">You Pay<span>${{$total}}</span></li>
									</ul>
									<div class="button5">
                                    <input type="hidden" name='grandTotal' value="{{ $total}}" >
										<a href="{{url('/checkout')}}" class="btn">Checkout</a>
										<a href="{{url('/')}}" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->
			
	<!-- Start Shop Services Area  -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
			<div class="container">
				<div class="inner-top">
					<div class="row">
						<div class="col-lg-8 offset-lg-2 col-12">
							<!-- Start Newsletter Inner -->
							<div class="inner">
								<h4>Newsletter</h4>
								<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
								<form action="{{ url('addSubscriber') }}" method="POST"  class="newsletter-inner">
									@csrf
									<input name="email" placeholder="Your email address" required="" type="email">
									<button class="btn" type="submit">Subscribe</button>
								</form>
							</div>
							<!-- End Newsletter Inner -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Shop Newsletter -->
	
	
	

	
	<!-- Start Footer Area -->
	<div class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col-2">
            <img src="{{url('/images/logo.svg')}}" alt="" />
            <p>At Zest we believe in quality and giving the best</p>
          </div>
          <div class="footer-col-3">
            <h3>Useful Links</h3>
            <ul>
              <li><a href="{{url('/about')}}">About Us</a></li>
              <li><a href="{{url('/terms')}}">Terms & Conditions</a></li>
            </ul>
          </div>
        </div>
        <hr />
        <p class="copyright">Copyright 2022 - ZEST</p>
      </div>
    </div>
	<!--End Footer Area-->
	
	
</body>
</html>