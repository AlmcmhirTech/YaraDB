<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>
    <!-- NAVIGATOR BAR-->

    <nav class="navbar navbar-expand-lg bg-body-tertiary py-3 fixed-top">

        <div class="container">
            <img class="logo" src="assets/imgs/logo.png"/>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> 
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            <p class="nav-link">Hello <strong>Mark</strong>!</p>

            <li class="nav-item">

                <a class="nav-link" href="./login-register/USER_ACCOUNT/login_user_type.php">Profile</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="./login-register/USER_ACCOUNT/login_user_type.php">Browse</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="">Help</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="./login-register/USER_ACCOUNT/register_user_type.php">Logout</a>
            </li>

            </ul>
        </div>
        </div>
    </nav>
 
      <!-- HOME -->

      <section id="home">
        <div class="container">
            <h1><span>Best Prices</span> This Month</h1>
            <p>DentalFinder Offers the best services for the most affordable prices</p>
            <button class="book-btn">Book Now</button>
        </div>

      </section>

      <!-- Popular Dental Clinics -->
      <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-2 py-5">
        <h3>Popular Dental Clinics</h3>
        <hr class="mx-auto">
        <p>Check out the popular dental clinics we have this month</p>
        </div>
        <div class="row mx-auto container-fluid">
            <div class="clinic text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/dental1.jpg"/>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="c-name">Yousef Dental Clinic</h5>
                <h4 class="c-price">₱999</h4>
                <button class="book-btn">Book Now</button>
            </div>
            <div class="clinic text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/dental2.jpg"/>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="c-name">Karylle Dental Clinic</h5>
                <h4 class="c-price">₱999</h4>
                <button class="book-btn">Book Now</button>
            </div>
            <div class="clinic text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/dental3.jpg"/>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="c-name">Paul Dental Clinic</h5>
                <h4 class="c-price">₱999</h4>
                <button class="book-btn">Book Now</button>
            </div>

            <div class="clinic text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/dental4.jpg"/>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="c-name">Ken Ken Dental Clinic</h5>
                <h4 class="c-price">₱999</h4>
                <button class="book-btn">Book Now</button>
            </div>
        </div>
       
      </section>

<!-- FOOTER BAR -->

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
                    <img src="payment.jpeg" alt="Payment Methods"/>
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