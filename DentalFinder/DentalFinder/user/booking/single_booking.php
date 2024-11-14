<?php
    session_start();

    if(isset($_SESSION["login"])){
        $user_id = $_SESSION['user_id'];
    }
    else {
        echo "User not logged in.";
        header("Location: ../login/user_login.php");
    }
    require_once "../../classes/clinicappointmentclass.php";
    
    // Initialize variable
    $get_clinic_id = '';
    
    // Check if 'clinic_id' exists in the query string
  
    if (isset($_GET['clinic_id'])) {
        $get_clinic_id = $_GET['clinic_id']; // Retrieve the value
        
        echo $get_clinic_id;
    }
    else{
         echo "ohodasdas";
    }

    $appointmentObj = new ClinicAppointment();
   

    $user_id = $_SESSION['user_id'];
    $branch_id = $service_id = $appointment_date = $set_time = $payment_method_id = $clinic_id = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $clinic_id = $get_clinic_id;
        $branch_id = $_POST['branch_id'];
        $appointment_date = $_POST['appointment_date'];
        $set_time = $_POST['set_time'];
        $service_id = $_POST['service_id'];

        if(empty($appointment_date) || empty($set_time) || empty($service_id)){
            
            if(empty($clinic_id)){
                $bypassErr = "Oopsies! You may have bypassed through here :D";
            }
            if(empty($appointment_date)){
                $appointmentErr = "Set Appointment Date";
            }
            if(empty($set_time)){
                $timeErr = "Set Time";
            }
            if(empty($service_id)){
                $serviceErr = "Choose one of our services";
            }
            
        }
        else{
            $_SESSION["clinic_id"] = $clinic_id;
            $_SESSION['branch_id'] = $branch_id;
            $_SESSION['appointment_date'] = $appointment_date;
            $_SESSION['set_time'] = $set_time;
            $_SESSION['service_id'] = $service_id;

            $appointmentObj->addBooking($user_id);
            header("Location: ../interface/booking.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="../../css/single_booking.css">
</head>
<body>


<!-- NAVIGATOR BAR -->

<?php require_once '../interface/navigator.php';?>

<!--Single Booking-->
<section class="container single-booking my-5 pt-5">
    <div class="row mt-5">
        <div class="col-lg-5 col-md-6 col-sm-12">
            <img class="img-fluid w-100 pb-1" src="../assets/imgs/dental1.jpg" id="mainImg"/>
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="../assets/imgs/dental3.jpg" width="100%" class="small-img"/>
                </div>
                <div class="small-img-col">
                    <img src="../assets/imgs/dental4.jpg" width="100%" class="small-img"/>
                </div>
                <div class="small-img-col">
                    <img src="../assets/imgs/dental1.jpg" width="100%" class="small-img"/>
                </div>
                <div class="small-img-col">
                    <img src="../assets/imgs/dental2.jpg" width="100%" class="small-img"/>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="service-details">
                <h3 class="py-1">ZenDentistry Downtown</h3>
                <h6>Dental Clinic</h6>
                <h6>Address: 4567 Mabini Street, Barangay Santo Niño, Quezon City, Metro Manila, 1100 Philippines</h6>
                <h4 class="mb-5">Service Details</h4>
                <span>
                    The details of this service will be displayed shortly.
                    <strong>ZenDentistry Downtown</strong> offers a variety of dental treatments that ensure high-quality care.
                </span>
            </div>
        </div>
    </div> <!-- Closing row div -->

    <!-- Booking Section -->
    <div class="mt-5">
        <div class="container text-center">
            <h2 class="form-weight-bold">Book Now</h2>
            <hr class="mx-auto">
        </div>
        <form id="appointment-form" action='single_booking.php?clinic_id=<?= urlencode($get_clinic_id) ?>' method='post'>

                        <div class="form-group">
                            <label for = "appointment_date">Appointment Date:</label>
                            <input type="date" class="form-control" id="field" name="appointment_date">
                        </div>

                        <div class="form-group">
                            <label for = "set_time">Set Time:</label>
                            <input type="time" class="form-control" id="field" name="set_time">
                        </div>
                        
                              
                        <div class="form-group">
                            <label for = "branch_id">Branch:</label><br>
                            <select class="form-control" id="field" name="branch_id">
                            <option value="">--Select--</option>
                                <?php
                                    $clinic_id = $get_clinic_id;
                                    $branch_id = '';
                                    $branches = $appointmentObj->fetchBranches($clinic_id);
                                    foreach ($branches as $branch){
                                ?>
                                    <option value="<?= $branch['branch_id'] ?>" <?= ($branch_id == $branch['branch_id']) ? 'selected' : '' ?>><?= $branch['branch_address'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
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
                            <input type="submit" class="book-btn" value="Book Now"/>
                        </div>
                    </form>
    </div> 

    <!-- Clinic Reviews Section -->
    <div class="mt-5">
        <div class="col-lg-6 col-md-12">
            <h3>Clinic Reviews:</h3>
            <div class="service-details">
                <h4>Mark Nagoyo</h4>
                <div class="star">
                    <h6>Rating:</h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <span>
                    Service was really convenient!!! I will surely come back. Thank you!
                </span>
            </div>
        </div>
        <div class="container text-center">
            <a href="reviews.php">View More...</a>
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
                <img class="img-fluid mb-3" src="../assets/imgs/dental1.jpg"/>
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
                <img class="img-fluid mb-3" src="../assets/imgs/dental2.jpg"/>
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
                <img class="img-fluid mb-3" src="../assets/imgs/dental3.jpg"/>
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
                <img class="img-fluid mb-3" src="../assets/imgs/dental4.jpg"/>
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


    <?php require_once("footer.php");?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-7/qmGFXRqHzg+OvoNhxQFsmFFyGp9SC6cH+z5MxgCzZmRMJIBmPnvsst5CQekmEe" crossorigin="anonymous"></script>
    <script src="../../js/single_booking.js"></script>
</body>
</html>
