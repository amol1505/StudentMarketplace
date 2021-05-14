<?php
require('connection.php');
require('functions.php');
$msg='';
$name='';
$title='';
$price='';
$category='';
$image='';
$description='';
$email='';
$number='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$productid=get_safe_value($con,$_GET['productid']);
	$res=mysqli_query($con,"select * from products where id='$productid'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$name=$row['name'];
		$title=$row['title'];
		$price=$row['price'];
		$category=$row['category'];
		$description=$row['description'];
		$email=$row['email'];
		$number=$row['number'];
	}else{
		header('location:index.php#listings');
		die();
	}
}
if (isset($_POST['submit'])){
    $name=get_safe_value($con,$_POST['name']);
    $title=get_safe_value($con,$_POST['title']);
    $price=get_safe_value($con,$_POST['price']);
    $category=get_safe_value($con,$_POST['category']);
    $description=get_safe_value($con,$_POST['description']);
    $email=get_safe_value($con,$_POST['email']);
    $number=get_safe_value($con,$_POST['number']);
    $res=mysqli_query($con,"select * from products where name='$name'");
    $check=mysqli_num_rows($res);
    if($check>0){
		if(isset($_GET['productid']) && $_GET['productid']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($productid==$getData['productid']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}
	
	
	if($_GET['productid']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],'img/product/'.$image);
				$update_sql="update products set name='$name',title='$title',price='$price',category='$category',image='$image',description='$description',email='$email',number='$number' where productid='$productid'";
			}else{
				$update_sql="update products set name='$name',title='$title',price='$price',category='$category',description='$description',email='$email',number='$number' where productid='$productid'";
			}
			mysqli_query($con,$update_sql);
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],'img/product/'.$image);
			mysqli_query($con,"insert into products(name,title,price,category,image,description,email,number) values('$name','$title','$price','$category','$image','$description','$email','$number')");
		}
		header('location:product.php');
		die();
	}
}
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
                <li class="nav-item">
                    <a class="nav-link" href="index.php#listings">Listings</a>
                </li>
                <li class="nav-item active">
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
<section class="ad-post bg-gray py-5">
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <!-- Post Listing details -->
            <fieldset class="border border-gary p-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Post Your ad</h3>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Title Of Ad:</h6>
                            <input type="text" class="border w-100 p-2 bg-white text-capitalize" placeholder="Ad title" name="title" required value="<?php echo $title?>">
                            <h6 class="font-weight-bold pt-4 pb-1">Item Price (£ GBP):</h6>
                            <div class="row px-3">
                                <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                        <input type="text" name="price" class="border-0 py-2 w-100 price" placeholder="Price"
                                            id="price" required value="<?php echo $price?>">
                                    </div>
                            </div>
                            <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                            <textarea name="description" placeholder="Enter product description" class="form-control" required><?php echo $description?></textarea>
                            <?php echo $description?>
                            </textarea>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Select Ad Category:</h6>
                            <select name="category" id="inputGroupSelect" class="w-100">
                                <option value="0">Select category</option>
                                <option value="1">Fashion</option>
                                <option value="2">Electronics & Media</option>
                                <option value="3">Hobby & DIY</option>
                                <option value="4">Furniture & Appliances</option>
                                <option value="5">Personal care</option>
                                <option value="6">Academics</option>
                            </select>
                            <div class="price">
                                <h6 class="font-weight-bold pt-5 pb-1">Image:</h6>
                            <div class="choose-file py-2 rounded">
                                <label for="file-upload">
                                    <input type="file" class="form-control-file" id="file-upload" name="image" required>
                                </label>
                            </div>
                        </div>
                    </div>
            </fieldset>

            <!-- seller-information-->
            <fieldset class="border p-4 my-5 seller-information bg-gray">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Seller Information</h3>
                    </div>
                    <div class="col-lg-6">
                        <h6 class="font-weight-bold pt-4 pb-1">Contact Name:</h6>
                        <input type="text" placeholder="name" name="name" class="border w-100 p-2" required value="<?php echo $name?>">
                        <h6 class="font-weight-bold pt-4 pb-1">Contact Number:</h6>
                        <input type="text" placeholder="Contact Number" class="border w-100 p-2" name="number" required value="<?php echo $number?>">
                    </div>
                    <div class="col-lg-6">
                        <h6 class="font-weight-bold pt-4 pb-1">Contact Email:</h6>
                        <input type="email" name="email" placeholder="name@yourmail.com" class="border w-100 p-2" required value="<?php echo $email?>">
                    </div>
                </div>
            </fieldset>

            <div class="checkbox d-inline-flex">
                <input type="checkbox" id="terms-&-condition" class="mt-1" required>
                <label for="terms-&-condition" class="ml-2">By click you must agree with our
                    <span> <a class="text-success" href="terms.html">Terms & Condition and Posting Rules.</a></span>
                </label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary d-block mt-2">Post Your Ad</button>
            <div class="field_error"><?php echo $msg?></div>
        </form>
    </div>
</section>
</main>
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
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
  </body>
</html>