<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/patient_login.css">
</head>
<body>

    <?php
    session_start();
    
    require_once "../../classes/user_classes.php";
    require_once "../../classes/admin_class.php";

    $addUser = new User;
    $adminObj = new Admin;
    if (isset($_POST["login"])) {
        // Sanitize email and store password
        $addUser->email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $addUser->password = $_POST['password'];
    
        // Call to loginUser, assuming it returns user data or false
        $verify = $addUser->loginUser($addUser->email);
    
        if ($verify) {
            // Verify the password using the hashed password from the database
            if (password_verify($addUser->password, $verify['password'])) {
                $_SESSION["login"] = true;
                $_SESSION["user_id"] = $verify['user_id'];
                $user_id = $verify['user_id'];
                $user_type = 'User';
                $activity_type = 'Login';
                $adminObj->activityLog($user_id, $user_type, $activity_type);
                header("Location: ../interface/browse.php");
                exit; // Make sure to exit after redirect
            } else {
                // Incorrect password
                echo "<div class='alert alert-danger'>Password does not match</div>";
            }
        } else {
            // No user found with that email
            echo "<div class='alert alert-danger'>Email does not match</div>";
        }
    }
    
    ?>

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
    <form action="user_login.php" method="post">
        <h1 id="Title">Login to your account</h1>
        <h4 id="T-para">Login in now to find out the best dental service.</h4>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Enter your email" required><br>
        <label for="password">Password</label>
        <input type="password" id="password_bar" name="password" placeholder="Enter your password" required><br>
        <div class="forgot-remember">
                <div class="fpass">
                    <a href="forgot.html">Forgot Password?</a>
                </div>
                <div class="remember">
                    <input id="remember" type="checkbox">
                    <label for="remember">Remember Me</label>
                </div>
        </div>
        <a href=""></a><button type="submit" name = "login" id="Login_button">Login</button>
        <div class="dha">
                <p>Dont Have an Account? <a href="client-reg.html">Signup</a></p>
        </div>
    </form>
</section>


</body>
</html>