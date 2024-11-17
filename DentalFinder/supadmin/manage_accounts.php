<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Accounts</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/clinic.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- SIDEBAR -->
    <div class="wrapper">
        <?php require_once("sidebar.php"); ?>

        <!-- NAVBAR -->
        <div class="main">

            <nav class="navbar navbar-expand px-4 py-3">
                <div class="sidebar-name">
                    <a href="#">Dental Finder</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" id="navbarDropdown" aria-expanded="false">
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

            <main class="content px-3 py-4">
                <!-- TABLE BODY -->
                <h3 class="fw-bold fs-4 my-3">Accounts</h3>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <!-- TABLE HEADER -->
                                <tr class="highlight">
                                    <th scope="col">No.</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Contact #</th>
                                    <th scope="col">User Type</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>iloveyou123</td>
                                    <td>09123456789</td>
                                    <td>Dental Clinic</td>
                                    <td>2024-04-09</td>
                                    <td>
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal1">View Details</button>

                                        <!-- Modal for User 1 -->
                                        <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="modal1Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="modal1Label">Details</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">Username</th>
                                                                    <td>iloveyou123</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Clinic Name</th>
                                                                    <td>ZenDentistry Clinic</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Contact #</th>
                                                                    <td>09921286521</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Created At</th>
                                                                    <td>2024-04-09</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Email</th>
                                                                    <td>ZenDentistry@email.com</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Account Status</th>
                                                                    <td><span class="badge text-bg-success">Active</span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>iloveyou123456</td>
                                    <td>09123456789</td>
                                    <td>Patient</td>
                                    <td>2024-05-09</td>
                                    <td>
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal2">View Details</button>

                                        <!-- Modal for User 2 -->
                                        <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="modal2Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="modal2Label">Details</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">Username</th>
                                                                    <td>iloveyou123456</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Clinic Name</th>
                                                                    <td>Yousef Badua</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Contact #</th>
                                                                    <td>09921286521</td>
                                                                </tr>
                                                                <!-- Add other details here -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- Closing col-12 div -->
                </div> <!-- Closing row div -->

                <h3 class="fw-bold fs-4 my-3">Dental Clinics</h3>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <!-- TABLE HEADER -->
                                <tr class="highlight">
                                    <th scope="col">No.</th>
                                    <th scope="col">Images</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Contact #</th>
                                    <th scope="col">User Type</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>IMAGE HERE</td>
                                    <td>iloveyou123</td>
                                    <td>09123456789</td>
                                    <td>Dental Clinic</td>
                                    <td>2024-04-09</td>
                                    <td>
                                        <!-- Action Buttons -->
                                        <button type="button" class="btn btn-success">Confirm</button>
                                        <button type="button" class="btn btn-danger">Decline</button>
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal-verify1">View Details</button>

                                        <!-- Modal for User 1 -->
                                        <div class="modal fade" id="modal-verify1" tabindex="-1" aria-labelledby="modal1Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="modal1Label">Account Details</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">Username</th>
                                                                    <td>iloveyou123</td>
                                                                </tr>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">Documents Image</th>
                                                                    <td>Image HERE</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Clinic Name</th>
                                                                    <td>ZenDentistry Clinic</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Contact #</th>
                                                                    <td>09921286521</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Created At</th>
                                                                    <td>2024-04-09</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Email</th>
                                                                    <td>ZenDentistry@email.com</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Account Status</th>
                                                                    <td><span class="badge text-bg-warning">Unverified</span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        </main>
    </div>
    
    <script src="../assets/js/style.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>