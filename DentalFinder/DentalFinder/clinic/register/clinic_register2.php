<?php
session_start();

require_once "../../classes/clinic_classes.php";
$addClinic = new Clinic();
$servicesErr = '';

// Check if session variables from the first step exist


$password_ = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if(isset($_POST['services']) && is_array($_POST['services'])){
        
        $addClinic->clinic_name = $_SESSION['clinic_name'];
        $addClinic->clinic_email = $_SESSION['clinic_email'];
        $password_ = $_SESSION['password'];
        $addClinic->mobile_number = $_SESSION['mobile_number'];
        $addClinic->license_code = $_SESSION['license_code'];
        $addClinic->clinic_address = $_SESSION['clinic_address'];

        $pending_id = $addClinic->addClinicRequest($password_);

        $service_names = $_POST['services'];
        $addClinic->addServicesRequest($pending_id, $service_names);
        
        $_SESSION = []; 
        session_destroy(); 
        header("Location: ../login/clinic_login.php");
    }
}
?>
<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Register</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="../../css/clinic_login_register.css">
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
        <form action = 'clinic_register2.php' method = 'post' id="register-form2">
            <div class="form-group" id="service-offered">
                <!-- SERVICES OFFERED -->
                <label><strong>What services do you offer?</strong></label><br>
                <div class="form-group">
                    <label for="cleaning" id="service-offered-label">
                        <input type="checkbox" id="cleaning" name="services[]" value="Cleaning"> Cleaning
                    </label>
                </div>
                <div class="form-group">
                    <label for="exam" id="service-offered-label">
                        <input type="checkbox" id="exam" name="services[]" value="Exam"> Exam
                    </label>
                </div>
                <div class="form-group">
                    <label for="whitening" id="service-offered-label">
                        <input type="checkbox" id="whitening" name="services[]" value="Whitening"> Whitening
                    </label>
                </div>
                <div class="form-group">
                    <label for="cosmetic" id="service-offered-label">
                        <input type="checkbox" id="cosmetic" name="services[]" value="Cosmetic">Cosmetic Procedures
                    </label>
                </div>
                <div class="form-group">
                    <label for="orthodontics" id="service-offered-label">
                        <input type="checkbox" id="orthodontics" name="services[]" value="Orthodontics"> Orthodontics
                    </label>
                </div>

                <div class="form-group" id="others">
                    <label for="others" id="service-offered-label">Others: </label>
                    <textarea id="others" name="others"></textarea>
                </div>
            </div>

            <div class="form-group">
                <br>
                <input type="submit" class="service-btn" id="register-btn2" value="Next"/>
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