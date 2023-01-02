@extends('master')
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
              @if(Auth::user()->is_admin===1)
              <li><a href="{{ route('adminhome') }}">Account</a></li>
              @else
              <li><a href="{{ url('/home') }}">Account</a></li>
              @endif
              @else
              <li><a href="{{ route('login') }}">Account</a></li>
              @endauth
              @endif
            </ul>
          </nav>
          <a href="{{url('/cart')}}"><img
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
		
		
		
		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Categories</h3>
									<ul class="categor-list">
									@foreach($categories as $category)
										<li><a href="{{url($category->userType.'/'.$category->categoryId)}}">{{$category->categoryName}}</a></li>
										@endforeach
									</ul>
								</div>
								<!--/ End Single Widget -->
						
								<!-- Single Widget -->
								<div class="single-widget recent-post">
									<h3 class="title">Recent post</h3>
									<!-- Single Post -->
									@foreach($recents as $recent)
									<div class="single-post first">
										<div class="image">
											<img src="{{url('/images/'.$recent->picture)}}" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">{{$recent->productName}}</a></h5>
											<p class="price">${{$recent->price}}</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<!-- End Single Post -->
									@endforeach
									
									
								</div>
								<!--/ End Single Widget -->
								
						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>Sort By :</label>
											<select name='dropDown' id='dropDown' onchange="javascript:location.href = this.value;">
												<option  value="{{URL::current().'?sort=price_asc'}}">Price - Low to High</option>
												<option value="{{URL::current().'?sort=price_desc'}}">Price - High to Low</option>
												<option selected="selected" value="{{URL::current().'?sort=newest'}}">Newest</option>
											</select>
										</div>
									</div>
								</div>
								<!--/ End Shop Top -->
							</div>
						</div>
                        
						<div class="row">
						
                            @foreach($products as $product)
							<div class="col-lg-4 col-md-6 col-12">
								<div class="single-product">
									<div class="product-img">
											
											<img class="hover-img" src="{{url('/images/'.$product->picture)}}" alt="#">
										<div class="button-head">
											<div class="product-action">
												
												
												<input type='hidden' value='{{$product->productId}}' name='productId'></input>
											</div>
											<div class="product-action-2">
											<form action="{{ url('/description') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->productId }}" name="id"></input>
                        
                        <input type='submit' class="px-4 py-2 text-white bg-blue-800 rounded" value='View Product'></input>
</form>
											</div>
										</div>
									</div>
									<div class="product-content">
										<h5>{{$product->productName}}</h5>
										<div class="product-price">
											<span>${{$product->price}}</span>
										</div>
									</div>
								</div>
							</div>
							
							@endforeach
						
						</div>
						
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->	

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
            <p>At Zest, we believe in quality and giving the best</p>
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