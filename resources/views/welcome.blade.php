<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>NEXT</title>
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
            <img src="{{url('/images/new-next-gold-logo.svg')}}" alt="RedStore Logo" width="125px" />
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
            <h1>Lorem ipsum dolor sit.</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, nostrum.</p>
            <a href="" class="btn">Shop Now &#8594; </a>
          </div>
          <div class="col-2">
            <img src="img/banner.png" alt="" />
          </div>
        </div>
      </div>
    </div>


    <!-- Featured Products -->

    <div class="small-container">
      <h2 class="title" id="men">Men</h2>
      <div class="row">
        <div class="col-4">
          <a href=""><img src="https://xcdn.next.co.uk/common/items/default/default/publications/g26/shotzoom/11/355-592s.jpg?im=Resize,width=364" alt="" />
          <h4>Formal</h4></a>
        </div>
        <div class="col-4">
          <a href=""><img src="https://xcdn.next.co.uk/common/items/default/default/publications/g25/shotzoom/2028/206-781s.jpg?im=Resize,width=364" alt="" />
          <h4>Jeans</h4></a>
        </div>
        <div class="col-4">
          <a href=""><img src="https://xcdn.next.co.uk/common/items/default/default/publications/g25/shotzoom/2065/145-512s.jpg?im=Resize,width=364" alt="" />
          <h4>Shirts</h4></a>
        </div>
        <div class="col-4">
          <a href=""><img src="https://xcdn.next.co.uk/common/items/default/default/itemimages/altitemzoom/541094s.jpg?im=Resize,width=364" alt="" />
          <h4>Sportswear</h4></a>
        </div>
      </div>

      <h2 class="title" id="women">Women</h2>
      <div class="row">
        <div class="col-4">
          <a href=""><img src="https://xcdn.next.co.uk/common/items/default/default/publications/gl8/shotzoom/88/p49-968s.jpg?im=Resize,width=364" alt="" />
          <h4>Dresses</h4></a>
        </div>
        <div class="col-4">
          <a href=""><img src="https://xcdn.next.co.uk/common/items/default/default/itemimages/altitemzoom/q05504s.jpg?im=Resize,width=364" alt="" />
          <h4>Shirts & Blouses</h4></a>
        </div>
        <div class="col-4">
          <a href=""><img src="https://xcdn.next.co.uk/common/items/default/default/publications/g66/shotzoom/135/207-667s.jpg?im=Resize,width=364" alt="" />
          <h4>Jeans</h4></a>
        </div>
        <div class="col-4">
          <a href=""><img src="https://xcdn.next.co.uk/common/items/default/default/publications/g65/shotzoom/505/t85-836s.jpg?im=Resize,width=364" alt="" />
          <h4>Loungewear</h4></a>
        </div>
        <div class="row">
          <div class="col-4">
            <a href=""><img src="https://xcdn.next.co.uk/common/items/default/default/itemimages/altitemzoom/a86457s.jpg?im=Resize,width=364" alt="" />
            <h4>Formal</h4></a>
          </div>
          <div class="col-4">
            <a href=""><img src="https://xcdn.next.co.uk/common/items/default/default/publications/g65/shotzoom/41/t71-032s.jpg?im=Resize,width=364" alt="" />
            <h4>Sportswear</h4></a>
          </div>
          <div class="col-4">
            <a href=""><img src="https://xcdn.next.co.uk/common/items/default/default/publications/g65/shotzoom/100/a90-532s.jpg?im=Resize,width=364" alt="" />
            <h4>Skirts</h4></a>
          </div>
          <div class="col-4">
            <a href=""><img src="https://xcdn.next.co.uk/common/items/default/default/publications/g55/shotzoom/1020/383-048s.jpg?im=Resize,width=364" alt="" />
            <h4>Blazers</h4></a>
          </div>
        </div>
      </div>

      <h2 class="title" id="kids">Kids</h2>
      <div class="row">
        <div class="col-4">
          <a href=""><img src="https://xcdn.next.co.uk/common/items/default/default/publications/g64/shotzoom/4029/447-359s.jpg?im=Resize,width=364" alt="" />
          <h4>Shorts</h4></a>
        </div>
        <div class="col-4">
          <a href=""><img src="https://xcdn.next.co.uk/common/items/default/default/publications/g63/shotzoom/4204/m86-053s.jpg?im=Resize,width=364" alt="" />
          <h4>Jumpers & Knitwear</h4></a>
        </div>
        <div class="col-4">
          <a href=""><img src="https://xcdn.next.co.uk/common/items/default/default/publications/g65/shotzoom/4708/u29-459s.jpg?im=Resize,width=364" alt="" />
          <h4>Shirts</h4></a>
        </div>
        <div class="col-4">
          <a href=""><img src="https://xcdn.next.co.uk/common/items/default/default/publications/g65/shotzoom/4506/a06-762s.jpg?im=Resize,width=364" alt="" />
          <h4>Pyjamas</h4></a>
        </div>
      </div>
    </div>

    <!--Offer -->

    <div class="offer">
      <div class="small-container">
        <div class="row">
          <div class="col-2">
            <img
              src="img/banner.png"
              class="offer-img"
              alt="orange watch"
            />
          </div>
          <div class="col-2">
            <p>Exclusively Available on NEXT</p>
            <h1>Lorem ipsum dolor sit.</h1>
            <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum a quas repellendus inventore doloribus eveniet fugiat nam, omnis ea odio!</small>
            <a href="" class="btn">Shop Now &#8594;</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Testimonials -->

    <div class="testimonial">
      <div class="small-container">
        <div class="row">
          <div class="col-3">
            <i class="fa fa-quote-left"></i>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. In
              nesciunt doloremque maxime quidem necessitatibus sed repellat ea
              officia quibusdam! Sunt.
            </p>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <img src="img/user-1.png" alt="human face" />
            <h3>Grace Cho</h3>
          </div>
          <div class="col-3">
            <i class="fa fa-quote-left"></i>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. In
              nesciunt doloremque maxime quidem necessitatibus sed repellat ea
              officia quibusdam! Sunt.
            </p>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <img src="img/user-2.png" alt="human face" />
            <h3>Frank Garett</h3>
          </div>
          <div class="col-3">
            <i class="fa fa-quote-left"></i>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. In
              nesciunt doloremque maxime quidem necessitatibus sed repellat ea
              officia quibusdam! Sunt.
            </p>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <img src="img/user-3.png" alt="human face" />
            <h3>Charolette Rue</h3>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->

    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col-2">
            <img src="{{url('/images/new-next-gold-logo.svg')}}" alt="" />
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla, quae!</p>
          </div>
          <div class="footer-col-3">
            <h3>Useful Links</h3>
            <ul>
              <li><a href="">Link1</a></li>
              <li><a href="">Link2</a></li>
              <li><a href="">Link3</a></li>
              <li><a href="">Link4</a></li>
            </ul>
          </div>
          <div class="footer-col-4">
            <h3>Follow Us</h3>
            <ul>
              <li><a href="">Facebook</a></li>
              <li><a href="">Twitter</a></li>
              <li><a href="">Instagram</a></li>
              <li><a href="">Discord</a></li>
            </ul>
          </div>
        </div>
        <hr />
        <p class="copyright">Copyright 2022 - Faiz Kamal</p>
      </div>
    </div>
    <script>
      var MenuItems = document.getElementById("MenuItems");

      MenuItems.style.maxHeight = "0px";

      function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
          MenuItems.style.maxHeight = "220px";
        } else {
          MenuItems.style.maxHeight = "0px";
        }
      }
    </script>
  </body>
</html>