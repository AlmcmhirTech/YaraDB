<?php

require_once '../../classes/admin_class.php';

$status = $pending_id = '';

$adminObj = new Admin();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['button'])) {

        if ($_POST['button'] == 'Accepted') {
            $status = $_POST['button'];
            $pending_id = $_POST['pending_id'];
            $adminObj->updateStatus($pending_id, $status);
            $adminObj->ConfirmClinic($pending_id);
        }

        if ($_POST['button'] == 'Delete') {
            $pending_id = $_POST['pending_id'];
            $adminObj->deleteClinicRequest($pending_id);
        }
    }

    if (isset($_POST['ubutton'])) {

        if ($_POST['ubutton'] == 'Delete') {
            $user_id = $_POST['user_id'];
            $adminObj->deleteUser($user_id);
        }
    }

    if (isset($_POST['cbutton'])) {

        if ($_POST['cbutton'] == 'Delete') {
            $clinic_id = $_POST['clinic_id'];
            $adminObj->deleteClinic($clinic_id);
        }
    }

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/clinics.css">
</head>

<body>
    <div class="wrapper">
        <?php require_once("../sidebar.php"); ?>

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
                <h3 class="fw-bold fs-4 my-3">Accounts</h3>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr class="highlight">
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                $users = $adminObj->showUsers();

                                foreach ($users as $arr) {
                                    ?>
                                    <tr>
                                        <td><?= $arr['name'] ?></td>
                                        <td><?= $arr['email'] ?></td>
                                        <td><?= $arr['mobile_number'] ?></td>
                                        <td>
                                            <form action="manage_accounts.php" method="post">
                                                <input type="hidden" name="user_id" value="<?= $arr['user_id'] ?>">
                                                <button type="submit" class="btn btn-danger" name="ubutton" value="Delete">Delete</button>
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#viewProfileModal">View Profile</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <h3 class="fw-bold fs-4 my-3">Dental Clinics</h3>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr class="highlight">
                                    <th scope="col">ID</th>
                                    <th scope="col">Clinic Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">License</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $array = $adminObj->showRequests();
                                foreach ($array as $arr) {
                                    ?>
                                    <tr>
                                        <td><?= $arr['pending_id'] ?></td>
                                        <td><?= $arr['clinic_name'] ?></td>
                                        <td><?= $arr['clinic_email'] ?></td>
                                        <td><?= $arr['mobile_number'] ?></td>
                                        <td><?= $arr['license_code'] ?></td>
                                        <td><?= $arr['clinic_address'] ?></td>
                                        <td><?= $arr['status'] ?></td>
                                        <td>
                                            <form action="manage_accounts.php" method="post">
                                                <input type="hidden" name="pending_id" value="<?= $arr['pending_id'] ?>">
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmAcceptModal<?= $arr['pending_id'] ?>">Accept</button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmRejectModal<?= $arr['pending_id'] ?>">Reject</button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal<?= $arr['pending_id'] ?>">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Accept Modal -->
                                    <div class="modal fade" id="confirmAcceptModal<?= $arr['pending_id'] ?>" tabindex="-1" aria-labelledby="confirmAcceptModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmAcceptModalLabel">Confirm Accept</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to accept this request?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <form action="manage_accounts.php" method="post">
                                                        <input type="hidden" name="pending_id" value="<?= $arr['pending_id'] ?>">
                                                        <input type="hidden" name="button" value="Accepted">
                                                        <button type="submit" class="btn btn-success">Accept</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Reject Modal -->
                                    <div class="modal fade" id="confirmRejectModal<?= $arr['pending_id'] ?>" tabindex="-1" aria-labelledby="confirmRejectModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmRejectModalLabel">Confirm Reject</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to reject this request?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <form action="manage_accounts.php" method="post">
                                                        <input type="hidden" name="pending_id" value="<?= $arr['pending_id'] ?>">
                                                        <input type="hidden" name="button" value="Rejected">
                                                        <button type="submit" class="btn btn-danger">Reject</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="confirmDeleteModal<?= $arr['pending_id'] ?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this request?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <form action="manage_accounts.php" method="post">
                                                        <input type="hidden" name="pending_id" value="<?= $arr['pending_id'] ?>">
                                                        <input type="hidden" name="button" value="Delete">
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
