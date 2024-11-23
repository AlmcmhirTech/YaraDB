<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/clinic.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="wrapper">
        <?php require_once("../../clinic_sidebar.php"); ?>
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
                <h3 class="fw-bold fs-4 my-3">Services</h3>
                <button type="button" class="btn btn-success d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                    <i class="lni lni-circle-plus me-2"></i> Add Service
                </button>

                <!-- Modal for Adding Service -->
                <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addServiceLabel">Add Service</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <label for="category">Choose a Category:</label>

                                    <select id="category" class="form-select">
                                        <option value="">-- Select Category --</option>
                                        <option value="Preventive Care">Preventive Care</option>
                                        <option value="Restorative Dentistry">Restorative Dentistry</option>
                                        <option value="Cosmetic Dentistry">Cosmetic Dentistry</option>
                                        <option value="Orthodontics">Orthodontics</option>
                                        <option value="Periodontics">Periodontics (Gum Health)</option>
                                        <option value="Pediatric Dentistry">Pediatric Dentistry (Children’s Dental Care)</option>
                                        <option value="Oral Surgery">Oral Surgery</option>
                                        <option value="Prosthodontics">Prosthodontics (Dental Prosthetics)</option>
                                        <option value="Emergency Dental Services">Emergency Dental Services</option>
                                        <option value="Specialty Services">Specialty Services</option>
                                    </select>
                                    <div class="mt-2">
                                        <label for="service-name" class="form-label">Name of Service:</label>
                                        <input type="text" class="form-control" id="service-name" placeholder="Enter Name of Service">
                                    </div>
                                    <div class="mt-2">
                                        <label for="Price" class="form-label">Price (PHP):</label>
                                        <input type="number" class="form-control" id="minPrice" placeholder="Enter Price">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Continue</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr class="highlight">
                                    <th scope="col">No.</th>
                                    <th scope="col">Service Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Traditional braces</td>
                                    <td>Orthodontics</td>
                                    <td>PHP 5,000</td>
                                    <td>Applying a braces to the teeth</td>
                                    <td>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editServiceModal">
                                            Edit
                                        </button>

                                        <!-- Edit Clinic Modal -->
                                        <div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Edit Clinic Form -->
                                                        <label for="category">Choose a Category:</label>
                                                        <select id="category" class="form-select mb-3">
                                                            <option>-- Select Category --</option>
                                                            <option value="Preventive Care">Preventive Care</option>
                                                            <option value="Restorative Dentistry">Restorative Dentistry</option>
                                                            <option value="Cosmetic Dentistry">Cosmetic Dentistry</option>
                                                            <option value="Orthodontics">Orthodontics</option>
                                                            <option value="Periodontics">Periodontics (Gum Health)</option>
                                                            <option value="Pediatric Dentistry">Pediatric Dentistry (Children’s Dental Care)</option>
                                                            <option value="Oral Surgery">Oral Surgery</option>
                                                            <option value="Prosthodontics">Prosthodontics (Dental Prosthetics)</option>
                                                            <option value="Emergency Dental Services">Emergency Dental Services</option>
                                                            <option value="Specialty Services">Specialty Services</option>
                                                        </select>

                                                        <label for="service-name" class="form-label">Name of Service:</label>
                                                        <input type="text" class="form-control" id="service-name">

                                                        <div class="mt-2">
                                                            <label for="Price" class="form-label">Price (PHP):</label>
                                                            <input type="number" class="form-control" id="Price" placeholder="Enter Price">
                                                        </div>

                                                        <div class="mt-2">
                                                            <label for="description" class="form-label">Description:</label>
                                                            <input type="text" class="form-control" id="description">
                                                        </div>

                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteClinicModal">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="../assets/js/style.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>