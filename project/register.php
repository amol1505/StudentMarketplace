<?php>
require('connection.php');
require('functions.php');
$msg='';
if (isset($_POST['submit'])){
    $email = get_safe_value($con,$_POST['email']);
    $password = get_safe_value($con,$_POST['password']);
    $confirmpass = get_safe_value($con, $_POST['confirmpass']);
    if ($password == $confirmpass) {
        $keyhash = md5('hjsjJKWKsksskKK');
        $password = encrypt($password,$keyhash);
        $query = "select * from user where email='$email'";
        $check = mysqli_query($con,$query);
        if(mysqli_num_rows($check)>0){
            $msg='Account already exists';
            }
        else {
            mysqli_query($con,"insert into user(email,password) values('$email','$password')");
            $msg='Account created';
            
        }
    }
    else {
        $msg="Passwords dont match, try again";
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
                <li class="nav-item">
                    <a class="nav-link" href="listing.php">Add Listing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link login-button" href="login.php">Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link add-button" href="register.php" id="register">Sign up</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>    
    <div class="wrapper">
    <main>
    <div class="container text-center">
        <?php echo $msg ?>
    </div>
    <section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                        <h3 class="bg-gray p-4">Register Now</h3>
                        <form method="post">
                            <fieldset class="p-4">
                                <input type="email" name="email" placeholder="Email*" class="border p-3 w-100 my-2" required>
                                <input type="password" name="password" placeholder="Password*" class="border p-3 w-100 my-2" required>
                                <input type="password" name="confirmpass" placeholder="Confirm Password*" class="border p-3 w-100 my-2" required>
                                <div class="loggedin-forgot d-inline-flex my-3">
                                        <input type="checkbox" id="registering" class="mt-1">
                                        <label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="terms.html">Terms & Conditions</a></label>
                                </div>
                                <button type="submit" name="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Register Now</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
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