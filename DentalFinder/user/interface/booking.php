<?php
 session_start();

 if(isset($_SESSION["login"])){
    $user_id = $_SESSION['user_id'];
}
else {
    header("Location: ../login/user_login.php");
}


require_once "../../classes/clinic_classes.php";
require_once '../../classes/clinicappointmentclass.php';

?>

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

<?php 

require_once("navigator.php");?>


      <!--Bookings-->
      <section class="booking container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bold">Your Booking</h2>
            <hr>
        </div>

      <table class="mt-5 pt-5">
        <tr>
            <th>Dental Clinic</th>
            <th>Service</th>
            <th>Date</th>
            <th>Set Time</th>
            <th>Status</th>
        
        </tr>
            
        <?php 
                                
                                $showAppointment = new ClinicAppointment();
                            
                                $array = $showAppointment->showUserAppointments($user_id);

                                foreach($array as $arr){
                              
                                    ?>
                                     <tr>
                                        
                                    <td>
                                        <div class="booking-info">
                                        <img src="assets/imgs/dental3.jpg"/>
                                        <?= $arr['clinic_name']?>
                                        </div>
                                    </td>
                                    <t>
                                    <td><?= $arr['service_name']?></td>
                                    <td><?= $arr['appointment_date']?></td>
                                    <td><?= $arr['set_time']?></td>
                                    <td><?= $arr['status']?></td>
              
                                    <?php }?>
                                </table>
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
