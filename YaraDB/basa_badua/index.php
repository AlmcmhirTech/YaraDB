<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
   
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- NAVIGATOR BAR -->
    <?php require("navigator.php");?>
 
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
    <?php require_once("footer.php");?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>