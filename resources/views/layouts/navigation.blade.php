<nav class="navbar navbar-expand-lg  bg-light rounded" aria-label="Tenth navbar example">
<div class="container-fluid">
<div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">

    
    
    
@if (Route::has('login'))
                <ul class="navbar-nav">
                
                    @auth
                        <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}"><b>Home</b></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><b>Sign Out</b></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{url('/cart')}}"><b>View Cart</b></a>
                        </li>
                    @else
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><b>Sign In</b></a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><b>Register</b></a>
                            </li>
                        @endif
                    @endauth
                
@endif

                </ul>
</div>
</div>
</nav>