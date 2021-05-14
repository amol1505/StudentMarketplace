<?php
require('connection.php');
require('functions.php');


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="site.js"></script>
    <link href="style2.css" rel="stylesheet">
    <title>BSMP</title>
  </head>
  <body>
      <!-- Top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand pull-left" href="index.php"><img class="img-fluid" src="img/BSMP2.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#responsivebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="responsivebar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#listings">Listings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listing.php">Add Listing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link login-button" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link add-button" href="register.php" id="register">Sign up</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>    
    <!-- Search bar in front of carousel background -->
    <section class="search-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <form method="post">
                        <div class="p-1 bg-light shadow-sm">
                            <div class="input-group">
                                <input type="search" name="speech" placeholder="Search for listings" class="form-control border-0">
                                <div class="input-group-append">
                                <!-- Example single danger button -->
                                <select name="categories" class="form-control smallscreen">
                                <option value="">Category</option>
                                <option value="1">Fashion</option>
                                <option value="2">Electronics & Media</option>
                                <option value="3">Hobby & DIY</option>
                                <option value="4">Furniture & Appliances</option>
                                <option value="5">Personal care</option>
                                <option value="6">Academics</option>
                                </select>
                                </div>
                                <div class="input-group-append">
                                    <a name="search"></a>
                                    <button type="submit" name="submit" class="btn btn-link"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/carousell.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/carousel22.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/carousel3.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
    <div class="container-fluid">
        <div class="row jumbotron text-center">
            <div class="col-12">
                <p class="lead">A web market service allowing university students within Brighton to sell or buy items. </p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    <div class="col-12 text-center mt-5">
        <a name="listings"></a>
        <h1 class="text-dark pt-4">Listings</h1>
        <div class="border-top border-primary w-25 mx-auto my-3"></div>
        <p class="lead">Browse through categories of listings posted by your fellow students</p>
    </div>
    </div>
    <!-- Display products looping through the database -->
    <div class="container">
        <div class="row my-5">
            <?php
            $categories='';
            $speech='';
            if (isset($_POST['submit'])) {
                $speech=get_safe_value($con,$_POST['speech']);
                $categories=get_safe_value($con,$_POST['categories']);
            }
            $get_product=get_product($con,'latest','',$speech,$categories,'');
            foreach($get_product as $list) {
            ?>
            <div class="col-md-4 my-4 category">
                <img src="<?php echo 'img/product/'.$list['image']?>" alt="img" class="categoryimg">
                <h4 class="my-4 text-center"><?php echo $list['title']?></h4>
                <h6 class="my-4 text-center"><?php echo '£'. $list['price']?></h6>
                <a href="productdetails.php?productid=<?php echo $list['productid']?>" class="btn btn-outline-primary btn-md">View</a>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- Message with gradient background followed by footer -->
    <div class="fixed-background">
        <div class="row text-light py-5">
            <div class="col-12 text-center">
                <h1>Made for students by the students</h1>
                <h3 class="py-4">...tailored for your ease.</h3>
                <a href="#search" class="btn btn-primary btn-lg" ml-2>Search</a>
                <a href="listing.php" class="btn btn-danger btn-lg" ml-2>Sell</a>
            </div>
        </div>
    </div>
    <footer>
        <div class="container-fluid padding">
            <div class="row text-center">
                <div class="col-12">
                <h5>Brighton Market Place</h5>
                <hr class="light">
                <p>01784800240</p>
                <p>email@myemail.com</p>
                <p>University of Brighton</p>
                </div>
            </div>
        </div>
    </footer>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
  </body>
</html>