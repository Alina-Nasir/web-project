@extends('master')
@include('master2')
	  <!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="#">{{$userType}}</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
    </div>
		
		
       	<!-- Start Most Popular -->
	<div class="product-area most-popular section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
					<h2 class="title">{{$userType}}</h2>
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
						<!-- Start Single Product -->
                        @foreach($categories as $category)
						<div class="single-product">
							<div class="product-img">
								<a href="{{url($category->userType.'/'.$category->categoryId)}}">
									<img class="default-img" src="{{url('/images/'.$category->image)}}" alt="#">
									<img class="hover-img" src="{{url('/images/'.$category->image)}}" alt="#">
								</a>
							</div>
							<div class="product-content">
								<h3><a href="{{url($category->userType.'/'.$category->categoryId)}}">{{$category->categoryName}}</a></h3>
							</div>
						</div>
						<!-- End Single Product -->
						@endforeach
						
						
						
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End Most Popular Area -->	

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
								<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
									<input name="EMAIL" placeholder="Your email address" required="" type="email">
									<button class="btn">Subscribe</button>
								</form>
							</div>
							<!-- End Newsletter Inner -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Shop Newsletter -->
		@include('footer')
		
		
	
    
</body>
</html>