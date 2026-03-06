<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Interface
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Customers</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href={{route('customers.index')}}>Show Customers</a>
                        <a class="collapse-item" href={{route('customers.create')}}>Add Customers</a>
                        <a class="collapse-item" href={{route('reserved')}}>Show Reserved Customers</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Rooms</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href={{route('rooms.index')}}>Show Rooms</a>
                        <a class="collapse-item" href={{route('rooms.create')}}>Add Rooms</a>
                        <a class="collapse-item" href={{route('available')}}>Show Available Rooms</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                  aria-expanded="true" aria-controls="collapsePages">
                  <i class="fas fa-fw fa-wrench"></i>
                  <span>Reservations</span>
              </a>
              <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                  data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <a class="collapse-item" href={{route('reservations.index')}}>Show Reservations</a>
                      <a class="collapse-item" href={{route('reservations.create')}}>Add Reservations</a>
                      <a class="collapse-item" href={{route('checked')}}>Checked Out Reservations</a>
                  </div>
              </div>
          </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href={{url('style.css')}}>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body>
    <section class="main">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <p class="navbar-brand" >Hotel</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href={{route('hotel.index')}}>Home </a>
                <li class="nav-item ">
                    <a class="nav-link" href={{route('customers.index')}}>Customers </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href={{route('rooms.index')}}>Rooms </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href={{route('reservations.index')}}>Reservations </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{route('gallery')}}>Gallery</a>
                </li>
            </ul>
        </div>

    </nav>
    <div class="black">
        <div class="welcome">
            <p> welcome
            </p>
        </div>
        <div class="hero">
        </div>
    </div>
</section>
<section class="features ">
    <div class="title">
        <p>Features</p>
    </div>
    <div class="container">
        <div class="row">
          <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">5 Stars</h5>
                  <p class="card-text">Confort Rooms With Good Service 24/24.</p>
                </div>
              </div>          </div>
          <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Swimming Pool</h5>
                  <p class="card-text">Free Entrance.</p>
                </div>
              </div>            </div>
          <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Parking</h5>
                  <p class="card-text">Available Places And Organized Parking</p>
                </div>
              </div>           
             </div>
        </div>
      </div></section>
<section class="gallery ">
    <div class="title">
        <p>Gallery</p>
    </div>
    <div class="container">
        <div class="row">
          <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img src="images/room1.jpg" class="card-img-top" alt="...">
              </div>          
            </div>
          <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img src="images/pool.jpg" class="card-img-top" alt="...">

              </div>    
          </div>
          <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img src="images/parking.jpg" class="card-img-top" alt="...">

              </div>              </div>
        </div>
      </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
</body>

</html>
-->