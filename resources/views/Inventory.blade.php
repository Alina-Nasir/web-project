<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Inventory</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbars-offcanvas/">
    
    
    <!-- piechart link -->
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts.min.js"></script>



<script>
  
$(function(){

  'use strict'
 
  /**************** PIE CHART ************/
  var pieData = [{
    name: 'Stock Distribution in $',
    type: 'pie',
    radius: '70%',
    center: ['50%', '57.5%'],
    data: <?php echo json_encode($Data); ?>,
    label: {
      normal: {
        fontFamily: 'Roboto, sans-serif',
        fontSize: 11
      }
    },
    labelLine: {
      normal: {
        show: false
      }
    },
    markLine: {
      lineStyle: {
        normal: {
          width: 1
        }
      }
    }
  }];

  var pieOption = {
    tooltip: {
      trigger: 'item',
      formatter: '{a} <br/>{b}: {c} ({d}%)',
      textStyle: {
        fontSize: 11,
        fontFamily: 'Roboto, sans-serif'
      }
    },
    legend: {},
    series: pieData
  };

  var pie = document.getElementById('chartPie');
  var pieChart = echarts.init(pie);
  pieChart.setOption(pieOption);
   /** making all charts responsive when resize **/
});
$(function(){

'use strict'

/**************** PIE CHART ************/
var pieData2 = [{
  name: 'Sales of current items in $',
  type: 'pie',
  radius: '70%',
  center: ['50%', '57.5%'],
  data: <?php echo json_encode($Data2); ?>,
  label: {
    normal: {
      fontFamily: 'Roboto, sans-serif',
      fontSize: 11
    }
  },
  labelLine: {
    normal: {
      show: false
    }
  },
  markLine: {
    lineStyle: {
      normal: {
        width: 1
      }
    }
  }
}];

var pieOption2 = {
  tooltip: {
    trigger: 'item',
    formatter: '{a} <br/>{b}: {c} ({d}%)',
    textStyle: {
      fontSize: 11,
      fontFamily: 'Roboto, sans-serif'
    }
  },
  legend: {},
  series: pieData2
};

var pie2 = document.getElementById('chartPie2');
var pieChart2 = echarts.init(pie2);
pieChart2.setOption(pieOption2);
 /** making all charts responsive when resize **/
});

</script>
    <!-- end links -->

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
        background-color: black rgba(0, 0, 0, .1);
        border: solid black  rgba(0, 0, 0, .15);
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
      .chart-container {
    width: 50%;
    height: 50%;
    margin: auto;
  }
    </style>
    <?php
    function computePrice($a, $b, $c, $d){
        return ($a+$b+$c)* $d;
    }
    ?>

    
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
            <li class="nav-item">
              <a style='color: black;' class="nav-link" href="{{ route('addAdmin') }}">Add New Admin</a>
            </li>
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
            <a class="nav-link active" aria-current="page" href="{{ route('addProduct') }}">
              <span data-feather="home" class="align-text-bottom"></span>
              Add Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('addCategory') }}">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Add Category
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('showCustomers') }}">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Registered Customers
            </a>
          </li>
          
          
        </ul>

        <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Year-end sale
            </a>
          </li>
        </ul> -->
      </div>
    </nav>
    

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Inventory</h1>
        <!-- <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div> -->
      </div>

      <h4 class="h4">Inventory Statistics</h4>
      <!-- pichart html code  -->
      <hr>
      <div id="chartPie" style="height: 300px ; "></div>
      <hr>
      <div id="chartPie2" style="height: 300px; "></div>
     
      <br>
<!-- code ended -->
<hr>

<h4 class="h4">Inventory Details</h4>
<hr>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">Product Id</th>
              <th scope="col">Product Name</th>
              <th scope="col">Small Size Qty.</th>
              <th scope="col">Medium Size Qty.</th>
              <th scope="col">Large Size Qty.</th>
              <th scope="col">Price/item</th>
              <th scope="col">Price/stock</th>
              <th scope="col">Picture</th>
            
            </tr>
          </thead>
          <tbody>
            <?php
            $counter=1;
            ?>
         
          @foreach($inventory_details as $inventory_details)
                                  <tr>
                                        <td >
                                        <?php
                                        echo $counter;
                                        ?>
                                      </td>
                                      <td >
                                      {{ $inventory_details->productId }} 
                                      </td>
                                      <td >
                                      {{ $inventory_details->productName }} 
                                      </td>
                                      <td >
                                      {{ $inventory_details->small }} 
                                      </td>
                                      <td >
                                      {{ $inventory_details->medium }} 
                                      </td>
                                      <td >
                                      {{ $inventory_details->large }} 
                                      </td>
                                      <td >
                                      {{ $inventory_details->price }}.$
                                      </td>
                                      <td >
                                      <?php
                                     echo computePrice($inventory_details->small,$inventory_details->medium,$inventory_details->large,$inventory_details->price) .'.$';
                                      ?>
                                      </td>
                                      <td >
                                      <img src="{{url('images/'.$inventory_details->picture)}}" >
                                      </td>
                                      
        </tr>                   
                                <?php
                                    $counter++;
                                    ?>

                              @endforeach
          </tbody>
        </table>
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
