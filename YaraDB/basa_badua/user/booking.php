<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary py-3 fixed-top">

        <div class="container">
            <img class="logo" src="assets/imgs/logo.png"/>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> 
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="browse.php">Browse</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Help</a>
            </li>

            </ul>
        </div>
        </div>
    </nav>



      <!--Bookings-->
      <section class="booking container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bold">Your Booking</h2>
            <hr>
        </div>

      <table class="mt-5 pt-5">
        <tr>
            <th>Dental Clinic</th>
            <th>Date</th>
            <th>Service</th>
            <th>Status</th>
            <th>Subtotal</th> 
            <th>Action</th> 
        </tr>
        <tr>
            <td>
                <div class="booking-info">
                    <img src="assets/imgs/dental3.jpg"/>
                    <div>
                        <p>Jamir Basa's Dental Clinic</p>
                        <small><span>₱</span>500</small>
                        <br>
                    </div>
                </div>
            </td>

            <td>
                <p>2024-09-20</p>
            </td>
            
            <!--
            <td>
                <input type="number" value="1"/>
                <a class="edit-btn" href="#">Edit</a>
            </td>
            -->
            <td>
                <p>Cleaning</p>
            </td>

            <td>
                <p>Pending</p>
            </td>

            <td>
                <span>₱</span>
                <span class="clinic-price">1000</span>
            </td>

            <td>
            <button type="button" class="btn btn-success" id="leave-review-btn">
             Edit Booking
            </button> 
            </td>
        </tr>

        <tr>
            <td>
                <div class="booking-info">
                    <img src="assets/imgs/dental3.jpg"/>
                    <div>
                        <p>Jamir Basa's Dental Clinic</p>
                        <small><span>₱</span>500</small>
                        <br>
                    </div>
                </div>
            </td>

            <td>
                <p>2024-09-20</p>
            </td>
            
            <!--
            <td>
                <input type="number" value="1"/>
                <a class="edit-btn" href="#">Edit</a>
            </td>
            -->
            <td>
                <p>Cleaning</p>
            </td>

            <td>
                <p>Pending</p>
            </td>

            <td>
                <span>₱</span>
                <span class="clinic-price">1000</span>
            </td>

            <td>
            <button type="button" class="btn btn-success" id="leave-review-btn">
             Edit Booking
            </button> 
            </td>
        </tr>

        <tr>
            <td>
                <div class="booking-info">
                    <img src="assets/imgs/dental3.jpg"/>
                    <div>
                        <p>Jamir Basa's Dental Clinic</p>
                        <small><span>₱</span>500</small>
                        <br>
                    </div>
                </div>
            </td>

            <td>
                <p>2024-09-20</p>
            </td>
            

            <td>
                <p>Cleaning</p>
            </td>

            <td>
                <p>Pending</p>
            </td>

            <td>
                <span>₱</span>
                <span class="clinic-price">1000</span>
            </td>
            <td>
            <button type="button" class="btn btn-success" id="leave-review-btn">
             Edit Booking
            </button> 
            </td>
        </tr>

        <tr>
            <td>
                <div class="booking-info">
                    <img src="assets/imgs/dental3.jpg"/>
                    <div>
                        <p>Jamir Basa's Dental Clinic</p>
                        <small><span>₱</span>500</small>
                        <br>
                    </div>
                </div>
            </td>

            <td>
                <p>2024-09-20</p>
            </td>
            
            <!--
            <td>
                <input type="number" value="1"/>
                <a class="edit-btn" href="#">Edit</a>
            </td>
            -->
            <td>
                <p>Cleaning</p>
            </td>

            <td>
                <p>Done</p>
            </td>

            <td>
                <span>₱</span>
                <span class="clinic-price">1000</span>
            </td>
            
            <td>

            <button type="button" class="btn btn-warning" id="leave-review-btn">
             Leave a review
            </button> 

            </td>
        </tr>
      </table>



<!--
      <div class="booking-total">
        <table>
            <tr>
                <td>Subtotal</td>
                <td>₱1000</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>₱1000</td>
            </tr>
        </table>
      </div>

    <div class="checkout-container">
        <button class="btn checkout-btn">Checkout</button>
    </div>

-->
    </section>


    <!-- FOOTER BAR -->
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