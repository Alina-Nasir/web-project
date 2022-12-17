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
    <link rel="stylesheet" href="{{url('css/product_desc.css')}}">
	<script src="{{url('js/bootstrap2.min.js')}}"></script>
    <script src="{{url('js/custom.js')}}"></script>
</head>
<body>
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
                                <img src="https://xcdn.next.co.uk/common/items/default/default/itemimages/altitemzoom/407106s.jpg?im=Resize,width=364" class="img-responsive" alt="" />
                            </div>
                            <!-- Slide 2 -->
                            <div class="item">
                                <img src="https://xcdn.next.co.uk/common/items/default/default/itemimages/altitemzoom/407106s2.jpg?im=Resize,width=364" class="img-responsive" alt="" />
                            </div>
                            <!-- Slide 3 -->
                            <div class="item">
                                <img src="https://xcdn.next.co.uk/common/items/default/default/itemimages/altitemzoom/407106s3.jpg?im=Resize,width=364" class="img-responsive" alt="" />
                            </div>
                            <!-- Slide 4 -->
                            <div class="item">
                                <img src="https://xcdn.next.co.uk/common/items/default/default/itemimages/altitemzoom/407106s3.jpg?im=Resize,width=364" class="img-responsive" alt="" />
                            </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel-2" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
                        <a class="right carousel-control" href="#myCarousel-2" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
                <h2 class="name">
                    Knitted Polo Shirt
                    <small>Product by <a href="javascript:void(0);">Some Seller</a></small>
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-muted"></i>
                    <a href="javascript:void(0);">10 customer reviews</a>
                </h2>
                <hr />
                <h3 class="price-container">
                    <b>$29.99</b>
                </h3>
                <div class="certified">
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" placeholder="1" class="qty-input form-control quantity"/>
                        <input type ='hidden' value ='{{$productId}}' class='product_id'>
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
                        <li class=""><a href="#specifications" data-toggle="tab">Specifications</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="more-information">
                            <br />
                            <strong>Description Title {{$productId}}</strong>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium provident inventore adipisci deleniti distinctio. Voluptatem modi aspernatur aut odio perspiciatis!
                            </p>
                        </div>
                        <div class="tab-pane fade" id="specifications">
                            <br />
                            <dl class="">
                                <dt>Spec 1</dt>
                                <dd>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga, voluptatem?</dd>
                                <br />

                                <dt>Spec 2</dt>
                                <dd>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste, optio.</dd>
                                <br />

                                <dt>Spec 3</dt>
                                <dd>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti, magnam.</dd>
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