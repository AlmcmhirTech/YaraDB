<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Branch</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/clinic.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="wrapper">
        <?php require_once("sidebar.php"); ?>
        <div class="main">

            <nav class="navbar navbar-expand px-4 py-3">
                <form action="#" class="d-none d-sm-inline-block">

                </form>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="account.png" class="avatar img-fluid" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded">
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-4">

                <h3 class="fw-bold fs-4 my-3">Clinic Branches</h3>
                <div>
                    <button type="button" class="btn btn-success d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addbtn">
                        <i class="lni lni-circle-plus me-2"></i>
                        Add Branch
                    </button>

                    <!-- Modal for Adding Dentist -->
                    <div class="modal fade" id="addbtn" tabindex="-1" aria-labelledby="branchmodal" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addBranch">Add Branch</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Add your Dentist form here -->
                                    <form>

                                        <div class="mb-3">
                                            <label for="product_image" class="form-label">Image</label>
                                            <input type="file" class="form-control" id="product_image" name="product_image" accept=".jpg, .jpeg, .png">
                                            <div class="invalid-feedback"></div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="bName" class="form-label">Clinic Name:</label>
                                            <input type="text" class="form-control" id="bName">
                                        </div>
                                        <div class="mb-3">
                                            <label for="bName" class="form-label">Clinic Address:</label>
                                            <input type="text" class="form-control" id="bName">
                                        </div>
                                        <div class="mb-3">
                                            <label for="bCode" class="form-label">License Code:</label>
                                            <input type="text" class="form-control" id="bCode">
                                        </div>

                                        <div class="mb-3">
                                            <label for="bNum" class="form-label">Contact #</label>
                                            <input type="tel" class="form-control" id="bNum">
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Request Verification</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr class="highlight">
                                    <th scope="col">No.</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Clinic Name</th>
                                    <th scope="col">Clinic Address</th>
                                    <th scope="col">License Code</th>
                                    <th scope="col">Contact #</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        Image Here
                                    </td>
                                    <td>John Paul Clinic</td>
                                    <td>123 Johnston St.</td>
                                    <td>52ASWQ</td>
                                    <td>092122444</td>
                                    <td><span class="badge bg-success">Verified</span></td>

                                    <td>
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit1">
                                                
                                        </button>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletebtn">
                                            Remove
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deletebtn" tabindex="-1" role="dialog" aria-labelledby="deletebtnTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deletebtnTitle">Delete Confirmation</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-danger">Delete</button>
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