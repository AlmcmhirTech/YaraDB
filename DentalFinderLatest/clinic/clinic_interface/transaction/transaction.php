<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
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
        <?php require_once("../../clinic_sidebar.php"); ?>

        <!-- NAVBAR -->
        <div class="main">

            <nav class="navbar navbar-expand px-4 py-3">
                <div class="sidebar-name">
                    <a href="#">Dental Finder</a>
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


            <!-- TABLE BODY -->
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>

                            <!-- TABLE HEADER -->
                            <tr class="highlight">
                                <th scope="col">No</th>
                                <th scope="col">Patient Name</th>
                                <th scope="col">Service Type</th>
                                <th scope="col">Price</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>Juan Dela Cruz</td>
                                <td>Teeth Cleaning</td>
                                <td>P1000</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmModal">
                                        Confirm
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmModalLabel">Confirm Payment?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="pName" class="form-label">Patient Name:</label>
                                                            <input type="text" class="form-control" id="pName" value="Juan Dela Cruz" readonly>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="service-type" class="form-label">Service Type</label>
                                                            <input type="text" class="form-control" id="service-type" value="Teeth Cleaning" readonly>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="price" class="form-label">Price</label>
                                                            <input type="text" class="form-control" id="service-type" value="P1000" readonly>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Status</label>
                                                            <input type="text" class="form-control" id="status" value="Pending" readonly>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success">Confirm</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- DELETE BUTTON -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletebtn">
                                        Delete
                                    </button>

                                    <!-- MODAL -->
                                    <div class="modal fade" id="deletebtn" tabindex="-1" role="dialog" aria-labelledby="deletebtnTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deletebtnTitle">No Show Confirmation</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to flag this patient?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-success">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>


                        </tbody>
                </div>
            </div>

            <script src="../assets/js/style.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>