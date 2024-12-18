<?php

    session_start();

    if(isset($_SESSION["login"])){
    $user_id = $_SESSION['user_id'];
    }
    else {
    echo "User not logged in.";
    header("Location: ../login/user_login.php");
    }
    
    require_once "../../clinic/appointment/clinicappointmentclass.php";
    require_once "../../payment/payment_class.php";


    $appointmentObj = new ClinicAppointment();
    $payment_methodObj = new PaymentMethod();
    $user_id = $_SESSION['user_id'];
    $service_id = $appointment_date = $set_time = $payment_method_id = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $appointment_date = $_POST['appointment_date'];
        $set_time = $_POST['set_time'];
        $service_id = $_POST['service_id'];
        $payment_method_id = $_POST['payment_method_id'];

        if(empty($appointment_date) || empty($set_time) || empty($service_id) || empty($payment_method_id)){
            if(empty($appointment_date)){
                $appointmentErr = "Set Appointment Date";
            }
            if(empty($set_time)){
                $timeErr = "Set Time";
            }
            if(empty($service_id)){
                $serviceErr = "Choose one of our services";
            }
            if(empty($payment_method_id)){
                $paymentErr = "Select a payment method";
            }
        }
        else{
            $appointmentObj->appointment_date = $appointment_date;
            $appointmentObj->set_time = $set_time;
            $appointmentObj->service_id = $service_id;

            $appointmentObj->addBooking($user_id);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
   
    <link rel="stylesheet" href="../../css/general_booking.css">
</head>
<body>
    <!--Navigation Bar-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary py-3 fixed-top">
        <div class="container">
            <img class="logo" src="assets/imgs/logo.png"/>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Browse</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Signup</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Single Booking-->
    <section class="container single-booking my-5 pt-5">
        <div class="row mt-5">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="assets/imgs/dental1.jpg" id="mainImg"/>
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/imgs/dental3.jpg" width="100%" class="small-img"/>
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/dental4.jpg" width="100%" class="small-img"/>
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/dental1.jpg" width="100%" class="small-img"/>
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/dental2.jpg" width="100%" class="small-img"/>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <h3 class="py-1">ZenDentistry Downtown</h3>
                <h6>Dental Clinic</h6>
                <h6>Adress: 4567 Mabini Street, Barangay Santo Niño, Quezon City, Metro Manila, 1100 Philippines</h6>

                <section>
                    <div class="container text-center">
                        <h2 class="form-weight-bold">Book Now</h2>
                        <hr class="mx-auto">
                    </div>
                    <form id="appointment-form" action = general_booking.php method = post>
                        <div class="form-group">
                            <label for = "appointment_date">Appointment Date:</label>
                            <input type="date" class="form-control" id="field" name="appointment_date">
                        </div>

                        <div class="form-group">
                            <label for = "set_time">Set Time:</label>
                            <input type="time" class="form-control" id="field" name="set_time">
                        </div>
                        
                        
                        <div class="form-group">
                            <label for = "service_id">Service:</label><br>
                            <select class="form-control" id="field" name="service_id">
                            <option value="">--Select--</option>
                                <?php
                                    $services = $appointmentObj->fetchServices($clinic_id);
                                    foreach ($services as $service){
                                ?>
                                    <option value="<?= $service['service_id'] ?>" <?= ($service_id == $service['service_id']) ? 'selected' : '' ?>><?= $service['service_name'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for = "payment_method_id">Payment Method:</label><br>
                            <select class="form-control" id="field" name="payment_method_id">
                                 <option value="">--Select--</option>
                                <?php
                                    $payments = $payment_methodObj->fetchPayments();
                                    foreach ($payments as $payment){
                                ?>
                                    <option value="<?= $payment['payment_method_id'] ?>" <?= ($payment_method_id == $payment['payment_method_id']) ? 'selected' : '' ?>><?= $payment['payment_name'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="book-btn" value="Book Now"/>
                        </div>
                    </form>
                </section>
            </div>
            <div class="service-details">
                <h4 class="mt-5 mb-5">Service Details</h4>
                <span>
                    The details of this service will be displayed shortly. 
                    <strong>ZenDentistry Downtown</strong> offers a variety of dental treatments that ensure high-quality care.
                </span>
            </div>
        </div>
    </section>

    <!--Related Services-->
    <section id="related-services" class="my-5 pb-5">
        <div class="container text-center mt-2 py-5">
            <h3>Related Services</h3>
            <hr class="mx-auto">
        </div>
        <div class="row mx-auto container-fluid">
            <!-- Example Related Services -->
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
                <h5 class="c-name">Jamir Dental Clinic</h5>
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
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-7/qmGFXRqHzg+OvoNhxQFsmFFyGp9SC6cH+z5MxgCzZmRMJIBmPnvsst5CQekmEe" crossorigin="anonymous"></script>
    <script src="../../js/general_booking.js"></script>
</body>
</html>
