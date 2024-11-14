<?php 

require_once "../../../classes/clinic_classes.php";
require_once '../../../classes/clinicappointmentclass.php';

$appointmentObj = new ClinicAppointment();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);
    $appointmentId = $input['id'] ?? null;

    if ($appointmentId && $appointmentObj->acceptPatient($appointmentId)) {
        http_response_code(200); // Success
        echo json_encode(['status' => 'success']);
    } else {
        http_response_code(400); // Bad request
        echo json_encode(['status' => 'error', 'message' => 'Unable to process request']);
    }
}

?>
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
    <link rel="stylesheet" href="../../../css/appointment_records.css">
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
                                <th scope="col">Appointment No</th>
                                <th scope="col">Patient IDc</th>
                                <th scope="col">Patient Name</th>
                                <th scope="col">Service Type</th>
                                <th scope="col">Branch Address</th>
                                <th scope="col">Appointment Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                                <tbody></tbody>
                               
                                <?php 
                                
                                $showAppointment = new ClinicAppointment();
                                $clinic_id = $_SESSION['booking_clinic_id'];
                                $array = $showAppointment->showBooking($clinic_id);

                                foreach($array as $arr){
                                    $user_id = $arr['user_id'];
                                    $name = $showAppointment->selectUser($user_id);
                                    $branch_id = $arr['branch_id'];
                                    $branch_name = $showAppointment->selectBranch($branch_id);
                                    $service_id = $arr['service_id'];
                                    $service_type = $showAppointment->selectServices($service_id);
                                    ?>
                                     <tr>
                                        
                                    <td><?=$arr['appointment_id'];?></td>
                                    <td><?= $arr['user_id']?></td>
                                    <td><?= $name['patient_name']?></td>
                                    <td><?= $service_type['service_name']?></td>
                                    <td><?= $branch_name['branch_address']?></td>
                                    <td><?= $arr['appointment_date']?></td>
                                    <td><?= $arr['status']?></td>

                             
                                
                                        <td>
                                            <button type="button" class="btn btn-success" data-appointment-id="<?=$arr['appointment_id'];?>" onclick="acceptPatient(this.dataset.appointmentId)" data-bs-toggle= "modal" data-bs-target="#deletebtn">
                                                Confirm
                                            </button>
                                            <div class="modal fade" id="deletebtn" tabindex="-1" role="dialog" aria-labelledby="deletebtnTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deletebtnTitle">Confirmation</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Will be processed shortly
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                
                                    </tr>
                                
                                    <?php }?>
                                </tbody>
        </div>
    </div>

    <script src="bookings.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
