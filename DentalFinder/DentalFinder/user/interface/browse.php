<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<!-- NAVIGATOR BAR -->

<?php 
 session_start();

 if(isset($_SESSION["login"])){
    $user_id = $_SESSION["user_id"];
}
else {
    header("Location: ../login/user_login.php");
    exit();
}

require_once("navigator.php");?>

<section id="featured" class="my-5 pb-5">
    <div class="container mt-2 py-1 d-flex justify-content-between align-items-center">
    <h3>Our services</h3>
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>      
    </div>
    <div class="row mx-auto container">
    <p>Here you can check out the popular dental clinics</p>

    
        <th>
            <?php
            require_once '../../classes/clinic_classes.php';
            $clinicObj = new Clinic;
            $clinics = $clinicObj->showClinics();
            foreach($clinics as $clinic){
             
                ?>
               <td><?= $clinic['clinic_id'] ?></td>
                    <div
                        onclick="window.location.href='../booking/single_booking.php?clinic_id=<?= urlencode($clinic['clinic_id'])?>'" 
                        class="clinic text-center col-lg-3 col-md-4 col-sm-12">
                        
                        <img class="img-fluid mb-3" src="../assets/imgs/dental1.jpg" alt="Clinic Image"/>
                        
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        
                        <h5 class="c-name"><?= $clinic['clinic_name'] ?></h5>
                        <h4 class="c-price">₱999</h4>
                        <button class="book-btn">Book Now</button>
                    </div>

            <?php
             }
             ?>
        </th>


        <nav aria-label="Page navigation ">
            <ul class="pagination mt-5">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>

    </div>
  </section>
 


    <!-- FOOTER BAR -->
    <?php require_once("footer.php");?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

