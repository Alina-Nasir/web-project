<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Admin Profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbars-offcanvas/">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

   


<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
          
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color:black rgba(0, 0, 0, .1);
        border: solid black rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
     
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    

<nav class="navbar navbar-dark bg-dark" aria-label="Dark offcanvas navbar">
    <div class="container-fluid">
      <p class="navbar-brand" >NEXT</p>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarDark" aria-controls="offcanvasNavbarDark">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbarDark" aria-labelledby="offcanvasNavbarDarkLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarDarkLabel">ADMIN</h5>
          <button  type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div  class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a style='color: black;' class="nav-link active" aria-current="page" href="{{ route('adminhome') }}">Home</a>
            </li>
            <!-- <li class="nav-item">
              <a style='color: black;' class="nav-link" href="#">Link</a>
            </li> -->
            <li class="nav-item dropdown">
              <a style='color: black;' class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Account
              </a>
              <ul class="dropdown-menu">
                <li><a style='color: black;' class="dropdown-item" href="{{ route('adminProfile') }}">Admin Profile</a></li>
                <li><a style='color: black;' class="dropdown-item" href="{{ route('adminlogout') }}">Sign Out</a></li>
                <!-- <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a style='color: black;' class="dropdown-item" href="#">Something else here</a></li> -->
              </ul>
            </li>
          </ul>
          
        </div>
      </div>
    </div>
  </nav>


<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('inventory') }}">
              <span data-feather="home" class="align-text-bottom"></span>
              Inventory
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('addProduct') }}">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Add Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('addCategory') }}">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Add Category
            </a>
          </li>
          
          
        </ul>

       
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin Profile</h1>
       
      </div>
      <section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page">Information</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="data:image/png;base64,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" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{ Auth::user()->fname." ".Auth::user()->lname}}</h5>
            <p class="text-muted mb-1">Manager</p>
            <p class="text-muted mb-4">@NEXT</p>
           
          </div>
        </div>
        
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->fname." ".Auth::user()->lname}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->email}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Contact</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->contact}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Birthday</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->birthday}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->house_no}}</p>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>
      

      
      
      </div>
      <br>
      <hr>
      <br>
      
        
      </div>
    </main>
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
