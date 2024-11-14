<?php

session_start();
if(!isset($_SESSION['clinic_login'])){
        header('location: ../login/clinic_login.php');
}

require_once '../../clinic_classes.php';
require_once '../../clinicappointmentclass.php';

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="records.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <?php require_once '../sidebar.php';?>

        <div class="main">

            <nav class="navbar navbar-expand px-4 py-3">
                <div class="sidebar-name">
                    <a href="../index.php">Dental Finder</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" id="navbarDropdown">
                                <img src="pfp.jpg" class="avatar img-fluid" alt="Profile Picture">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><button class="dropdown-item" type="button" id="messages">Messages</button></li>
                            <li><button class="dropdown-item" type="button" id="logout">Logout</button></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr class="highlight">
                                <th scope="col">No</th>
                                <th scope="col">Patient Name</th>
                                <th scope="col">Contact #</th>
                                <th scope="col">Appointment Date</th>
                                <th scope="col">Appointment Time</th>
                                <th scope="col">Service Type</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>

                                <tbody></tbody>
                                
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>Juan Dela Cruz</td>
                                        <td>09123456789</td>
                                        <td>2024-10-01</td>
                                        <td>10:00 AM - 11:00 AM</td>
                                        <td>Teeth Cleaning</td>
                                        <td><span class="badge bg-success">Confirmed</span></td>               
                                    </tr>
                                
                                
                                </tbody>
        </div>
    </div>

    <script src="records.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
