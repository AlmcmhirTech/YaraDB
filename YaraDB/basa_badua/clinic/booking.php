<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
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
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">Dental Finder</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Profile</span>
                    </a>
                </li>   
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-ticket-alt"></i>
                        <span>Bookings</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-book"></i>
                        <span>Records</span>
                    </a>
                </li>
                
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-users"></i>
                        <span>Dentists</span>
                    </a>
                </li>                
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Notifications <span class="badge text-bg-danger">7</span></span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

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
                                <th scope="col">Contact #</th>
                                <th scope="col">Appointment Date</th>
                                <th scope="col">Appointment Time</th>
                                <th scope="col">Service Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                                
                            <tr>
                                <td>1</td>
                                <td>Juan Dela Cruz</td>
                                <td>09123456789</td>
                                <td>2024-10-01</td>
                                <td>10:00 AM</td>
                                <td>Teeth Cleaning</td>
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
                                                    <h5 class="modal-title" id="confirmModalLabel">Confirm Booking?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="mb-3">
                                                            <label for="pName" class="form-label">Patient Name:</label>
                                                            <input type="text" class="form-control" id="pName" value="Juan Dela Cruz" readonly>
                                                        </div>
                            
                                                        <div class="mb-3">
                                                            <label for="dNum" class="form-label">Contact #</label>
                                                            <input type="tel" class="form-control" id="dNum" value="09123456789" readonly>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="bookingDate" class="form-label">Booking Date</label>
                                                            <input type="date" class="form-control" id="bookingDate" value="2024-10-01" readonly>
                                                        </div>  
                                                                                
                                                        <div class="mb-3">
                                                            <label for="startTime" class="form-label">Start Time</label>
                                                            <input type="time" class="form-control" id="startTime" value="10:00" readonly>
                                                        </div>
                            
                                                        <div class="mb-3">
                                                            <label for="service-type" class="form-label">Service Type</label>
                                                            <input type="text" class="form-control" id="service-type" value="Teeth Cleaning" readonly>
                                                        </div>
                            
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Status</label>
                                                            <input type="text" class="form-control" id="status" value="Pending" readonly>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-success">Confirm</button>
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
        </div>
    </div>

    <script src="../assets/js/style.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>



