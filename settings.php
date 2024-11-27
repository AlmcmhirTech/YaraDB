<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/clinic.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


</head>

<body>
    <div class="wrapper settings-page">
        <?php require_once("clinic_sidebar.php"); ?>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="account.png" class="avatar img-fluid" alt="User Avatar">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content px-3 py-4">
                <h1 class="text-center mb-4">Settings</h1> <!-- Ensure heading is outside of the row -->
                <div class="row justify-content-center" id="settings">
                    <div class="col-md-8">
                        <div class="card settings-card p-4">

                            <h5 class="card-title mt-4">Notifications</h5>
                            <hr>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="emailNotifications">
                                <label class="form-check-label" for="emailNotifications">Email Notifications</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="smsNotifications">
                                <label class="form-check-label" for="smsNotifications">SMS Notifications</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="pushNotifications">
                                <label class="form-check-label" for="pushNotifications">Push Notifications</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="newsletterSubscriptions">
                                <label class="form-check-label" for="newsletterSubscriptions">Newsletter Subscriptions</label>
                            </div>

                            <h5 class="card-title mt-3">Appearance</h5>
                            <hr>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="darkMode">
                                <label class="form-check-label" for="darkMode">Dark Mode</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="largeText">
                                <label class="form-check-label" for="largeText">Large Text</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="highContrast">
                                <label class="form-check-label" for="highContrast">High Contrast</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="compactMode">
                                <label class="form-check-label" for="compactMode">Compact Mode</label>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>




    <script src="../assets/js/style.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>