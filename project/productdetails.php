<?php
require('connection.php');
require('functions.php');
$productid=get_safe_value($con,$_GET['productid']);
$get_product=get_product($con,'','','','',$productid);

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
    <div class="wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand pull-left" href="index.php"><img class="img-fluid" src="img/BSMP2.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#responsivebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="responsivebar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php#listings">Listings</a>
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
    <main>
    <section class="section bg-gray">
	<!-- Container Start -->
	<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
		<div class="row">
			<!-- Detail page main content -->
			<div class="col-md-12 mt-5">
				<div class="product-details">
					<h1 class="product-title text-center"><?php echo $get_product['0']['title']?></h1>
					<div class="product-meta">
						<ul class="list-inline">
							<li class="list-inline-item"><i class="fas fa-user-alt"></i> By <a href=""><?php echo $get_product['0']['name']?></a></li>
							<li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location: <a href="">Brighton, England</a></li>
						</ul>
					</div>

					
					<div class="container" align="center">
						<div class="product-slider-item my-4" data-image="images/products/products-1.jpg">
							<img src="<?php echo 'img/product/'.$get_product['0']['image']?>" alt="img" class="img-fluid">
						
					</div>
	

					<div class="content mt-5 mb-5 pt-5">
						<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description"
								 aria-selected="true">Product Description</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-details-tab" data-toggle="pill" href="#pills-details" role="tab" aria-controls="pills-details"
								 aria-selected="false">More Details</a>
							</li>
						</ul>
						<div class="tab-content mt-5" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
								<h3 class="tab-title">Product Description</h3>
								<p><?php echo $get_product['0']['description']?></p>

							</div>
							<div class="tab-pane fade" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab">
								<h3 class="tab-title">More Details</h3>
								<table class="table table-bordered product-table">
									<tbody>
										<tr>
											<td>Product Price</td>
											<td>£<?php echo $get_product['0']['price']?></td>
										</tr>
										<tr>
											<td>Seller Name</td>
											<td><?php echo $get_product['0']['name']?></td>
											
										</tr>
										<tr>
											<td>Seller Email</td>
											<td><?php echo $get_product['0']['email']?></td>
										</tr>
										<tr>
											<td>Seller Number</td>
											<td><?php echo $get_product['0']['number']?></td>
										</tr>
										<tr>
											<td>City</td>
											<td>Brighton</td>
										</tr>
										<tr>
											<td>Uploaded since</td>
											<td>2021</td>
										</tr>
										
									</tbody>
								</table>
							</div>
							
								
							</div>
						</div>
					</div>
				</div>
			</div>
			

		</div>
	</div>
	<!-- Container End -->
</section>
    </main>
    
    
    
    
    
    
    
    
    
    
    <footer class="footer-bottom">
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
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
  </body>
  
</html>