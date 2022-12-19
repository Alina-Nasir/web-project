<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>product detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
     <!-- CSFR token -->
     <meta name='csrf-token' content='{{ csrf_token()}}'>
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/home.css')}}"/>
    <link rel="stylesheet" href="{{url('css/product_desc.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<script src="{{url('js/bootstrap2.min.js')}}"></script>
    <script src="{{url('js/custom.js')}}"></script>
</head>
<body>
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
      <div class="container">
        <div class="navbar">
          <div class="logo">
            <img src="{{url('/images/new-next-gold-logo.svg')}}" alt="RedStore Logo" width="125px" />
          </div>
          <nav>
            <ul id="MenuItems">
              <li><a href="home.html">Home</a></li>
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
            src="{{url('/images/cart.png')}}"
            alt="Shopping cart icon"
            width="30px"
            height="30px"
          /></a>
        </div>
      </div>
    </div>
<div class="container">
    <!-- product -->
    <div class="product-content product-wrap clearfix product-deatil">
        <div class='product_data'>
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="product-image">
                    <div id="myCarousel-2" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel-2" data-slide-to="0" class=""></li>
                            <li data-target="#myCarousel-2" data-slide-to="1" class="active"></li>
                            <li data-target="#myCarousel-2" data-slide-to="2" class=""></li>
                            <li data-target="#myCarousel-2" data-slide-to="3" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                            <!-- Slide 1 -->
                            <div class="item active">
                                <img src="{{url('/images/'.$product->picture)}}" class="img-responsive" alt="" width='364' height='546' />
                            </div>
                            <!-- Slide 2 -->
                            <div class="item">
                                <img src="{{url('/images/'.$product->picture)}}" class="img-responsive" alt="" width='364' height='546'/>
                            </div>
                            <!-- Slide 3 -->
                            <div class="item">
                                <img src="{{url('/images/'.$product->picture)}}" class="img-responsive" alt="" width='364' height='546' />
                            </div>
                            <!-- Slide 4 -->
                            <div class="item">
                                <img src="{{url('/images/'.$product->picture)}}" class="img-responsive" alt="" width='364' height='546' />
                            </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel-2" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
                        <a class="right carousel-control" href="#myCarousel-2" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
                <h2 class="name">
                    {{$product->productName}}
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-muted"></i>
                    
                </h2>
                <hr />
                <h3 class="price-container">
                    <b>${{$product->price}}</b>
                </h3>
                <div class="certified">
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" placeholder="1" class="qty-input form-control quantity"/>
                        <input type ='hidden' value ='{{$product->productId}}' class='product_id'>
                        <label>Color</label>
                        <select class="form-control product-color" name="product-color" id="product-color">
                            <option value="black">Black</option>
                            <option value="white">White</option>
                            <option value="blue">Blue</option>
                        </select>
                        <label>Size</label>
                        <select class=" size-input form-control product-size" name="product-size" id="product-size">
                            <option value="small">S</option>
                            <option value="medium">M</option>
                            <option value="large">L</option>
                        </select>
                    </div>
                </div>
                <hr />
                <div class="description description-tabs">
                    <ul id="myTab" class="nav nav-pills">
                        <li class="active"><a href="#more-information" data-toggle="tab" class="no-margin">Product Description </a></li>
                        <li class=""><a href="#specifications" data-toggle="tab">Material</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="more-information">
                            <br />
                            <strong>Description Title</strong>
                            <p>
                                {{$product->description}}
                            </p>
                        </div>
                        <div class="tab-pane fade" id="specifications">
                            <br />
                            <dl class="">
                                <dt>Material</dt>
                                <dd>{{$product->material}}</dd>
                                <br />
                            </dl>
                        </div>
                        
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <button class=" add-to-cart-btn btn btn-success btn-lg">Add to Cart</button>
                        <a href="{{url('/cart')}}" class="btn btn-success btn-lg">View Cart</a>
                    </div>
                    
                </div>
            </div>
        </div>
</div>
    </div>
    <!-- end product -->
</div>

</body>
</html>