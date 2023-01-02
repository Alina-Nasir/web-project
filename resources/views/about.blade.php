<!doctype html>
<html lang="en">
    <head>
        <title>About Us</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,
            shrink-to-fit=no">
        <link
            href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700'
            rel='stylesheet' type='text/css'>
        <link rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('css/about.css')}}">
    </head>
    <body>

        <div class="header2">
            <div class="container2">
                <div class="navbar">
                    <div class="logo">
                        <img src="{{url('images/logo.svg')}}" alt="RedStore
                            Logo" width="125px" />
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
                    <a href=""><img
                            src="{{url('images/cart.png')}}"
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
            </div>
        </div>
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="wrapper">
                            <div class="row no-gutters">
                                <div class="col-lg-6">
                                    <div class="contact-wrap w-100 p-md-5 p-4">
                                        <h3>About Us</h3>
                                        <p>{{$about->text1}}</p>
                                        <p>{{$about->text2}}</p>
                                        <p>{{$about->text3}}</p>
                                        <div class="w-100 social-media mt-5">
                                            <h3>Follow Us</h3>
                                            <p>
                                                <a href="#">Facebook</a>
                                                <a href="#">Twitter</a>
                                                <a href="#">Instagram</a>
                                                <a href="#">Dribbble</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex
                                    align-items-stretch">
                                    <div class="info-wrap w-100 p-5 img"
                                        style="background-repeat: no-repeat;
                                        background-image:
                                        url(https://www.next.co.uk/nxtcms/resource/image/5364062/portrait_ratio4x5/560/700/dc1f60bd7c5a825d09263a01529e15f8/13E76199D16C7F2751CAD760D8BAAA50/gifts-1-.jpg);">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
        <script>
            var MenuItems = document.getElementById("MenuItems");
      
            MenuItems.style.maxHeight = "0px";
      
            function menutoggle() {
              if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "250px";
              } else {
                MenuItems.style.maxHeight = "0px";
              }
            }
          </script>
    </body>
</html>
