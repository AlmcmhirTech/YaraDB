<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="registers.css">
    <style>
  
    </style>
</head>
<body>

<?php
  require_once "database.php";
  require_once "branch_classes.php";

  $addBranch = new Branch();

  $branch_nameErr = $phoneErr = $servicesErr = $paymentErr = '';
  $error = '';
  $countErr = 0;
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $addBranch->branch_name = filter_var($_POST['clinic_name'], FILTER_SANITIZE_EMAIL);
    $addBranch->mobile_number = filter_var($_POST['mobile_number'], FILTER_SANITIZE_EMAIL);
    $addBranch->services = filter_var($_POST['services'], FILTER_SANITIZE_EMAIL);
    $addBranch->payment = filter_var($_POST['payment'], FILTER_SANITIZE_EMAIL);

    if (!empty($addBranch->branch_name) || !empty($addBranch->mobile_number) || !empty($addBranch->services) || !empty($addBranch->payment)) {

        if (empty($addBranch->clinic_name)){
            $branch_nameErr = "Clinic Branch Name Required!";
            $countErr++;
        }
        if (empty($addBranch->mobile_number)){
            $phoneErr = "Mobile Number Required!";
            $countErr++;
        }
        if (empty($addBranch->services)){
            $servicesErr = "Services Required!";
            $countErr++;
        }
        if (empty($addBranch->payment)){
            $paymentErr = "Payment Types Required!";
            $countErr++;
        }
    }
    else{
        $error = "All fields are required!";
    }

    if ($countErr == 0){
        $addClinic->addBranchProfile($passwordHash);
        echo "User Added!";
    }

}
?>

<!-- NAVIGATOR BAR -->
<nav class="navbar navbar-expand-lg bg-body-tertiary py-3 fixed-top">
    <div class="container">
        <img src="assets/imgs/logo.jpeg" alt="Logo"/>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>

                <li class="nav-item"><a class="nav-link" href="#">Help</a></li>

            </ul>
        </div>
    </div>
</nav>

<section class="box-container">
    <form action="register.php" method="post">
        <h1 id="Title">Create an account</h1>
        <h4 id="T-para">Enjoy our services to find your dream clinic.</h4>
         <span><?= $error?></span>
        <label for="fname">First Name</label>
        <input type="text" id="fname_bar" name="first_name" placeholder="Enter your first name">
        <span><?= $fnameErr; ?></span><br>
        <label for="mname">Middle Name</label>
        <input type="text" id="middlen_bar" name="middle_name" placeholder="Enter your middle name">
        <span><?= $mnameErr; ?></span><br>
        <label for="lname">Last Name</label>
        <input type="text" id="lname_bar" name="last_name" placeholder="Enter your last name">
        <span><?= $lnameErr?></span><br><br>
        <label for="email">Email</label>
        <input type="text" id="email_bar" name="email" placeholder="Enter your email">
        <span><?= $emailErr;?></span>
        <span><?= $emailVal?></span>
        <span><?= $emailExists?></span><br><br>
        <label for="password">Password</label>
        <input type="password" id="password_bar" name="password" placeholder="Enter your password">
        <span><?= $passwordErr?></span>
        <span><?= $passLength?></span><br><br>
        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="password_bar" name="confirm_password" placeholder="Confirm your password">
        <span><?= $conpasswordErr?></span>
        <span><?= $confirmPassword?></span><br><br>
        <label for="mobile_number">Mobile Number</label>
        <input type="tel" id="mobile_number" name="mobile_number" placeholder="Enter your mobile number" value="+63" minlength="19" maxlength="19" size="20">
        <span><?= $phoneErr?></span><br><br>
        <button type="submit" id="Create_button">Create account</button>
    </form>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-oBqDVmMz4fnFO9yKhCktJ8FP3j/RbW9r6Ko6IEo4u0VYl8DzROhpmzj7hzRIXJ4k" crossorigin="anonymous"></script>
</body>
</html>
