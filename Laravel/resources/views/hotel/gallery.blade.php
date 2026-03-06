<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
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
                        <a class="nav-link" href={{route('hotel.create')}}>Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{route('gallery')}}>Gallery</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>
    <section class="gallery ">
        <div class="title">
            <h1>Room Photos</h1>
        </div>
        <div class="container">
            <div class="row">
              <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <h4 style="text-align: center">Single Room</h4>
                    <img src="images/single.jpg" class="card-img-top">
                  </div>          
                </div>
              <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <h4 style="text-align: center">Double Room</h4>
                    <img src="images/double.jpg" class="card-img-top" >
                  </div>    
              </div>
              <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <h4 style="text-align: center">Sweet Room</h4>
                    <img src="images/sweet.jpg" class="card-img-top" >
                  </div>             
                 </div>
            </div>
          </div>
    </section>
    <section class="gallery ">
        <div class="title">
            <h1>Special Dishes</h1>
        </div>
        <div class="container">
            <div class="row">
              <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <h4 style="text-align: center">Scandinavian Steak and Potatoes</h4>
                    <img src="images/dish1.jpg" class="card-img-top">
                  </div>          
                </div>
              <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <h4 style="text-align: center">Japanese Roast Chicken</h4>
                    <img src="images/dish2.jpg" class="card-img-top" >
                  </div>    
              </div>
              <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <h4 style="text-align: center">Sweets</h4>
                    <img src="images/dish3.jpg" class="card-img-top" >
                  </div>             
                 </div>
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