<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <div class="wrapper">
     <?php require_once("sidebar.php"); ?>

        <div class="main">

            <nav class="navbar navbar-expand px-4 py-3">
                <form action="#" class="d-none d-sm-inline-block"></form>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="account.png" class="avatar img-fluid" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded"></div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h3 class="fw-bold fs-4 mb-3">Dashboard</h3>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="card border-2">
                                    <div class="card-body py-2">
                                        <h5 class="mb-2 fw-bold">Total Appointments</h5>
                                        <p class="mb-2 fw-bold">1000</p>
                                        <div class="mb-0">
                                            <span class="badge text-success me-2">+3.5%</span>
                                            <span class="fw-bold">Since Last Month</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="card border-2">
                                    <div class="card-body py-2">
                                        <h5 class="mb-2 fw-bold">Total Successful Bookings</h5>
                                        <p class="mb-2 fw-bold">500</p>
                                        <div class="mb-0">
                                            <span class="badge text-success me-2">1.5%</span>
                                            <span class="fw-bold">Since Last Month</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="card border-2">
                                    <div class="card-body py-2">
                                        <h5 class="mb-2 fw-bold">Income</h5>
                                        <p class="mb-2 fw-bold">P 200,540</p>
                                        <div class="mb-0">
                                            <span class="badge text-success me-2">+4.0%</span>
                                            <span class="fw-bold">Since Last Month</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <h3 class="fw-bold fs-4 my-3">Recent Accounts</h3>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
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
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal1">View Details</button>

                                                <!-- Modal -->
                                                <div class="modal" id="myModal1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Details</h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="row">Patient Name</th>
                                                                            <td>Yousef Badua</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">Contact #</th>
                                                                            <td>09921286521</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Booking Date</th>
                                                                            <td>Oct 07 2024</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Service Type</th>
                                                                            <td>Teeth Cleaning</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Transaction ID</th>
                                                                            <td>93DJ2231ADD35672D</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Payment Method</th>
                                                                            <td><span class="badge text-bg-primary">GCASH</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Status</th>
                                                                            <td><span class="badge text-bg-warning">Pending</span></td>
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
                                            <td>09987654321</td>
                                            <td>Patient</td>
                                            <td>2024-04-08</td>
                                            <td>
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal1">View Details</button>

                                                <!-- Modal -->
                                                <div class="modal" id="myModal1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Details</h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="row">Patient Name</th>
                                                                            <td>Yousef Badua</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">Contact #</th>
                                                                            <td>09921286521</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Booking Date</th>
                                                                            <td>Oct 07 2024</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Service Type</th>
                                                                            <td>Teeth Cleaning</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Transaction ID</th>
                                                                            <td>93DJ2231ADD35672D</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Payment Method</th>
                                                                            <td><span class="badge text-bg-primary">GCASH</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Status</th>
                                                                            <td><span class="badge text-bg-warning">Pending</span></td>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <h3 class="fw-bold fs-4 my-3">Recent Transactions</h3>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Patient Name</th>
                                            <th scope="col">Contact #</th>
                                            <th scope="col">Service Type</th>
                                            <th scope="col">Transaction ID</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Yousef Badua</td>
                                            <td>09921286521</td>
                                            <td>Teeth Cleaning</td>
                                            <td>93DJ2231ADD35672D</td>
                                            <td><span class="badge text-bg-primary">GCASH</span></td>
                                            <td><span class="badge text-bg-warning">Pending</span></td>
                                            <td>
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal1">View Details</button>

                                                <!-- Modal -->
                                                <div class="modal" id="myModal1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Details</h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="row">Patient Name</th>
                                                                            <td>Yousef Badua</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">Contact #</th>
                                                                            <td>09921286521</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Booking Date</th>
                                                                            <td>Oct 07 2024</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Service Type</th>
                                                                            <td>Teeth Cleaning</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Transaction ID</th>
                                                                            <td>93DJ2231ADD35672D</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Payment Method</th>
                                                                            <td><span class="badge text-bg-primary">GCASH</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Status</th>
                                                                            <td><span class="badge text-bg-warning">Pending</span></td>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>






                    </div>
                </div>
            </main>
        </div>

    </div>

    <script src="../assets/js/style.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
