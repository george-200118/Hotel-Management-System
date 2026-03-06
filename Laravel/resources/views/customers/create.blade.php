<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Customers</title>

    <!-- Custom fonts for this template -->
    <link href={{url('vendor/fontawesome-free/css/all.min.css')}} rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href={{url('css/sb-admin-2.min.css')}} rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href={{url('vendor/datatables/dataTables.bootstrap4.min.css')}} rel="stylesheet">
    <link rel="stylesheet" href={{url('style.css')}}>


</head>


<body id="page-top">

        <div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href={{route('hotel.index')}}>
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Hotel</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href={{route('hotel.index')}}>
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

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 ">
                            <h6 class="m-0 font-weight-bold text-primary"> Add Customer
                            <a href={{route('customers.index')}} class="float-right btn-primary btn-sm">Show Customers</a>
                            </h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="post" action={{route('customers.store')}}>
                                    @csrf
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>Name</th>
                                        <td>
                                            <input type="text" class="form-control" name="name" >
                                            @error('name')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                    @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>
                                            <input type="text" class="form-control" name="phone" >
                                            @error('phone')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                        </td>                                     
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>
                                            <input type="text" class="form-control" name="email" >
                                            @error('email')
                                            <p class="text-danger">
                                                {{$message}}
                                            </p>
                                        @enderror
                                        </td>
                                       
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>
                                            <input type="text" class="form-control" name="address" >
                                            @error('address')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                        @enderror
                                        </td>                                      
                                    </tr>
                                    </table>
                                    <button class="btn btn-success" type="submit">Submit</button>
                                </form>
                                @if (Session::has('Verify'))
                                <p class="text-success">{{session('Verify')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    

    <!-- Bootstrap core JavaScript-->
    <script src={{url('vendor/jquery/jquery.min.js')}}></script>
    <script src={{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}></script>

    <!-- Core plugin JavaScript-->
    <script src={{url('vendor/jquery-easing/jquery.easing.min.js')}}></script>

    <!-- Custom scripts for all pages-->
    <script src={{url('js/sb-admin-2.min.js')}}></script>

    <!-- Page level plugins -->
    <script src={{url('vendor/datatables/jquery.dataTables.min.js')}}></script>
    <script src={{url('vendor/datatables/dataTables.bootstrap4.min.js')}}></script>

    <!-- Page level custom scripts -->
    <script src={{url('js/demo/datatables-demo.js')}}></script>

</body>

</html>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customers</title>
    <link rel="stylesheet" href={{url('style.css')}}>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
     integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body>
    <section class="main">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <p class="navbar-brand">Hotel</p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href={{route('hotel.index')}}>Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{route('customers.create')}}>Add Customers</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href={{route('customers.index')}}>Show Customers </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href={{route('reserved')}}>Show Reserved Customers </a>
                    </li>
                </ul>
            </div>

        </nav>
    </section>
        <div class="customer">
            <div class="title">
                <p>Add Customer</p>
            </div>
            <form  method="post" action={{route('customers.store')}} class="needs-validation" >
                @csrf
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">Name</label>
                        <input type="text" class="form-control" id="validationCustom01" name="name" >
                        @error('name')
                            <p class="text-danger">
                                {{$message}}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Phone</label>
                        <input type="text" class="form-control" id="validationCustom02" name="phone" >
                        @error('phone')
                            <p class="text-danger">
                                {{$message}}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Address</label>
                        <input type="text" class="form-control" id="validationCustom03" name="address" >
                        @error('address')
                            <p class="text-danger">
                                {{$message}}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom04">Email</label>
                        <input type="text" class="form-control" id="validationCustom04" name="email" >
                        @error('email')
                            <p class="text-danger">
                                {{$message}}
                            </p>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary form-control" type="submit">Submit</button>
            </form>
        </section>
        @if (Session::has('Verify'))
            <p class="text-success">{{session('Verify')}}</p>
        @endif
    </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
</body>
</html>
-->