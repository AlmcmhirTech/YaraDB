<?php
session_start();
require_once "../../classes/clinic_classes.php";

$addClinic = new Clinic();

$clinic_name = $clinic_email = $password = $passwordRepeat = $mobile_number = $license_code = $clinic_address = '';
$clinic_nameErr = $clinic_emailErr = $clinic_addressErr = $passwordErr = $conpasswordErr = $licenseErr = $phoneErr = $error = '';
$countErr = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $clinic_name = htmlspecialchars($_POST['clinic_name'], ENT_QUOTES, 'UTF-8');
    $clinic_email = filter_var($_POST['clinic_email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $passwordRepeat = $_POST['confirm_password'];
    $mobile_number = htmlspecialchars($_POST['mobile_number'], ENT_QUOTES, 'UTF-8');
    $license_code = htmlspecialchars($_POST['license_code'], ENT_QUOTES, 'UTF-8');
    $clinic_address = htmlspecialchars($_POST['clinic_address'], ENT_QUOTES, 'UTF-8');

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
   
    // Validation
    if (empty($clinic_name)) {
        $clinic_nameErr = "Your Clinic Name is Required!";
        $countErr++;
    }
    if (empty($clinic_email)) {
        $clinic_emailErr = "Your Clinic Email is Required!";
        $countErr++;
    } else if (!filter_var($clinic_email, FILTER_VALIDATE_EMAIL)) {
        $clinic_emailErr = "Email is not valid";
        $countErr++;
    } else if ($addClinic->emailExists($clinic_email)) {
        $clinic_emailErr = "Email Already Exists!";
        $countErr++;
    }
    if (empty($clinic_address)) {
        $clinic_addressErr = "Address is Required!";
        $countErr++;
    }
    if (empty($password)) {
        $passwordErr = "Password is Required!";
        $countErr++;
    } else if (strlen($password) < 8) {
        $passwordErr = "Password must be at least 8 characters long";
        $countErr++;
    }
    if (empty($passwordRepeat)) {
        $conpasswordErr = "Confirm Password is Required!";
        $countErr++;
    } else if ($password !== $passwordRepeat) {
        $conpasswordErr = "Passwords do not match!";
        $countErr++;
    }
    if (empty($license_code)) {
        $licenseErr = "License is Required!";
        $countErr++;
    }
    if (empty($mobile_number)) {
        $phoneErr = "Mobile Number is Required!";
        $countErr++;
    }
    ?><h1><?= $countErr;?></h1>
    <?php
    // Only proceed if no errors
    if ($countErr == 0) {
        echo 'ey';

        $_SESSION['clinic_register'] = true;
        $_SESSION['clinic_name'] = $clinic_name;
        $_SESSION['clinic_email'] = $clinic_email;
        $_SESSION['password'] = $passwordHash;
        $_SESSION['mobile_number'] = $mobile_number;
        $_SESSION['license_code'] = $license_code;
        $_SESSION['clinic_address'] = $clinic_address;
       
        header("Location: clinic_register2.php");
        
    }
}
?>
<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Register 1</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

<!-- NAVIGATOR BAR -->

<nav class="navbar navbar-expand-lg bg-body-tertiary py-3 fixed-top">

    <div class="container">
        <img class="logo" src="assets/imgs/logo.png"/>
        <h2 class="brand">DentalFinder</h2>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> 
      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         
        <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">Browse</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">Help</a>
        </li>


        </ul>
      </div>
    </div>
</nav>


<!-- DENTAL CLINIC REGISTER FORM -->
 <section class="my-5 py5">
    <div class="container text-center mt-3 pt-3">
        <h2 class="form-weight-bold">Register Your Dental Clinic</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form action = 'clinic_register.php' method = 'post' id="register-form">
            <div class="form-group">
                <label>Clinic Name:</label>
                <input type="text" class="form-control" id="register-cname" name="clinic_name" placeholder="Clinic Name"/>
                <span><?= $clinic_nameErr?></span>
            </div>
           
            <div class="form-group">
                <label>Clinic Address:</label>
                <input type="text" class="form-control" id="register-caddress" name="clinic_address" placeholder="Clinic Address">
                <span><?= $clinic_addressErr?></span>
            </div>
            
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" id="register-cemail" name="clinic_email" placeholder="Email">
                <span><?= $clinic_emailErr?></span>
            </div>

            <div class="form-group">
                <label>Mobile Number:</label>
                <input type="tel" class="form-control" id="register-cnumber" name="mobile_number" placeholder="Mobile Number" value="+63" minlength="19" maxlength="19" size="20">
                <span><?= $phoneErr?></span>
            </div>


            <div class="form-group">
                <label>License Code:</label>
                <input type="text" class="form-control" id="register-clicense" name="license_code" placeholder="License Number">
                <span><?= $licenseErr?></span>
            </div>

            <!-- SERVICES OFFERED
            <div class="form-group">
                <label><strong>Services Offered</strong></label>
                <div>
                    <label for="cleaning">Cleaning</label>
                    <input type="checkbox" id="cleaning" name="services[]" value="Cleaning">
                </div>
                <div>
                    <label for="exam">Exam</label>
                    <input type="checkbox" id="exam" name="services[]" value="Exam">
                </div>
                <div>
                    <label for="whitening">Whitening</label>
                    <input type="checkbox" id="whitening" name="services[]" value="Whitening">
                </div>
                <div>
                    <label for="cosmetic">Cosmetic Procedures</label>
                    <input type="checkbox" id="cosmetic" name="services[]" value="Cosmetic">
                </div>
                <div>
                    <label for="orthodontics">Orthodontics</label>
                    <input type="checkbox" id="orthodontics" name="services[]" value="Orthodontics">
                </div>
            </div> 
            -->

            
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" id="register-password" name="password" placeholder="Password">
                <span><?= $passwordErr?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password:</label>
                <input type="password" class="form-control" id="register-confirm-password" name="confirm_password" placeholder="Confirm Password">
                <span><?= $conpasswordErr?></span>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn" id="register-btn" value="Register"/>
            </div>
            <div class="form-group">
               <p>Already have an account?<a id="login-url" class="btn">Login</a></p>
            </div>
        </form>
    </div>
 </section>




<footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <img class="logo" src="assets/imgs/logo.png" alt="Logo"/>
            <p class="pt-3">We provide the best services to your preference.</p>
        </div>

        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Featured</h5>
            <ul class="text-uppercase">
                <li><a href="#">Cleaning</a></li>
                <li><a href="#">Cleaning</a></li>
                <li><a href="#">Cleaning</a></li>
            </ul>
        </div>

        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Contact Us</h5>
            <div>
                <h6 class="text-uppercase">Address</h6>
                <p>Normal Road, Baliwasan, Zamboanga City 7000</p>
            </div>
            <div>
                <h6 class="text-uppercase">Phone Number</h6>
                <p>+639123456321</p>
            </div>
            <div>
                <h6 class="text-uppercase">Email</h6>
                <p>example@email.com</p>
            </div>
        </div>
    </div>

    <div class="copyright mt-5">
        <div class="row container mx-auto">
            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                <img src="assets/imgs/gcash.png" alt="Payment Methods"/>
                <img src="assets/imgs/maya.jpg" alt="Payment Methods"/>
                <img src="assets/imgs/paypal.jpg" alt="Payment Methods"/>
            </div>
            <div class="col-lg-6 col-md-7 col-sm-12 mb-4 text-center">
                <p>&copy; DentalFinder 2024. All Rights Reserved.</p>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-4 text-center">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
