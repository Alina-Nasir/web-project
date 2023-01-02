<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ZEST</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="{{url('css/home.css')}}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
  </head>
  <body>
    <div class="header">
      <div class="container">
        <div class="navbar">
          <div class="logo">
            <img src="{{url('/images/logo.svg')}}" alt="RedStore Logo" width="125px" />
          </div>
          <nav>
            <ul id="MenuItems">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li><a href="{{ url('/men') }}">Men</a></li>
              <li><a href="{{ url('/women') }}">Women</a></li>
              <li><a href="{{ url('/boys') }}">Boys</a></li>
              <li><a href="{{ url('/girls') }}">Girls</a></li>
              <li><a href="{{url('/contact')}}">Contact</a></li>
              @if (Route::has('login'))
              @auth
              @if(Auth::user()->is_admin===1)
              <li><a href="{{ route('adminhome') }}">Admin</a></li>
              @else
              <li><a href="{{ url('/home') }}">Admin</a></li>
              @endif
              @else
              <li><a href="{{ route('admin') }}">Admin</a></li>
              @endauth
              @endif
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
              <li>
	<div class="searchbar-container">
		<form  id='search-form' action="{{url('/searching')}}" method='POST' class="search-bar">
      @csrf
    <input name="search_product" id="search_text" placeholder="Search Products Here....." type="search" class='searchBar'>
			<button type="submit" name='searchbtn'><img src="{{url('images/search.png')}}" alt="search-icon"></button>
		</form>
	</div>
	<div class="clearfix"></div>
</li>
            </ul>
          </nav>
          <a href="{{url('/cart')}}"><img
            src="{{url('/images/cart.png')}}"
            alt="Shopping cart icon"
            width="30px"
            height="30px"
          /></a>
          
          <img
            src="{{url('/images/menu.png')}}"
            alt="menu icon"
            class="menu-icon"
            onclick="menutoggle()"
          />
        </div>
        <div class="row">
          <div class="col-2">
          @foreach($womenDresses as $dress)
            <h1>Women Dresses</h1>
            <p>{{$dress->description}}</p>
            <a href="{{url('women/'.$dress->categoryId)}}" class="btn">Shop Now &#8594; </a>
          </div>
          <div class="col-2">
            <img src="{{url('/images/'.$dress->image)}}" alt="" />
          </div>
          @endforeach
        </div>
      </div>
    </div>


    <!-- Featured Products -->

    <div class="small-container">
      <h2 class="title" id="men">Men</h2>
      <div class="row">
        @foreach($men as $man)
        <div class="col-4">
          <a href="{{url($man->type.'/'.$man->categoryId)}}"><img src="{{url('/images/'.$man->image)}}" alt="" />
          <h4>{{$man->description}}</h4></a>
        </div>
        @endforeach
      </div>

      <h2 class="title" id="women">Women</h2>
      <div class="row">
        @foreach($women as $woman)
        <div class="col-4">
          <a href="{{url($woman->type.'/'.$woman->categoryId)}}"><img src="{{url('/images/'.$woman->image)}}" alt="" />
          <h4>{{$woman->description}}</h4></a>
        </div>
        @endforeach
      </div>
        

      <h2 class="title" id="kids">Kids</h2>
      <div class="row">
      @foreach($boys as $boy)
        <div class="col-4">
          <a href="{{url($boy->type.'/'.$boy->categoryId)}}"><img src="{{url('/images/'.$boy->image)}}" alt="" />
          <h4>{{$boy->description}}</h4></a>
        </div>
        @endforeach
        @foreach($girls as $girl)
        <div class="col-4">
          <a href="{{url($girl->type.'/'.$girl->categoryId)}}"><img src="{{url('/images/'.$girl->image)}}" alt="" />
          <h4>{{$girl->description}}</h4></a>
        </div>
        @endforeach
        
      </div>
    </div>

    <!--Offer -->

    <div class="offer">
      <div class="small-container">
        <div class="row">
          <div class="col-2">
            <img
              src=""
              class="offer-img"
              alt=""
            />
          </div>
          <div class="col-2">
            <p>Exclusively Available on ZEST</p>
            <h1>Gift Cards & E-Gift Cards</h1>
            @foreach($gifts as $gift)
            <small>{{$gift->description}}</br></small>
            <a href="{{url('women/'.$gift->categoryId)}}" class="btn">Shop Now &#8594;</a>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Testimonials -->

    <div class="testimonial">
      <div class="small-container">
        <div class="row">
        @foreach($testimonials as $testimonial)
          <div class="col-3">
            <i class="fa fa-quote-left"></i>
            <p>
            {{$testimonial->description}}
            </p>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <img src="{{url('/images/'.$testimonial->image)}}" alt="human face" />
            <h3>Customer</h3>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- Footer -->

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
    <script>
      var MenuItems = document.getElementById("MenuItems");

      MenuItems.style.maxHeight = "0px";

      function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
          MenuItems.style.maxHeight = "350px";
        } else {
          MenuItems.style.maxHeight = "0px";
        }
      }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
$(document).ready(function () {
  src="{{ route('searchproductsajax')}}"
  $( "#search_text" ).autocomplete({
      source: function(request,response){
        $.ajax({
            url: src,
            dataType: 'json',
            data: {
              term: request.term
            },
            success: function (data) {
                response(data);
            }
        });
      },
      minLength:1
    });

    $(document).on('click','ui-menu-item',function () {
      $('#search-form').submit();
    });
});
      
    </script>
  </body>
</html>