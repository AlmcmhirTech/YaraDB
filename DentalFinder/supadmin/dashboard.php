<?php

require_once '../classes/clinic_classes.php';
require_once '../classes/user_classes.php';
require_once '../classes/admin_class.php';

$adminObj = new Admin;
$userObj = new User;

?>
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
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>

<body>

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
                    <a href="file:///c%3A/Users/RLF/Documents/DO%20WHAT%20YOU%20MUST%20%28IMPORTANT%29/ADMIN/bootstrap-5-dashboard-main/ADMIN/Profile/profile.html" class="sidebar-link">
                        <span>Dashboard</span>
                    </a>
                </li>   
                <li class="sidebar-item">
                    <a href="file:///c%3A/Users/RLF/Documents/DO%20WHAT%20YOU%20MUST%20%28IMPORTANT%29/ADMIN/bootstrap-5-dashboard-main/ADMIN/Profile/profile.html" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Dental Clinics</span>
                    </a>
                </li>   
                <li class="sidebar-item">
                    <a href="file:///c%3A/Users/RLF/Documents/DO%20WHAT%20YOU%20MUST%20%28IMPORTANT%29/ADMIN/bootstrap-5-dashboard-main/ADMIN/Analytics/analytics.html" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Patient Users</span>
                    </a>
                </li>         
                <li class="sidebar-item">
                    <a href="file:///c%3A/Users/RLF/Documents/DO%20WHAT%20YOU%20MUST%20%28IMPORTANT%29/ADMIN/bootstrap-5-dashboard-main/ADMIN/Message/message.html#" class="sidebar-link">
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
                <div class="container-fluid">
                    <div class="mb-3">
                        <h3 class="fw-bold fs-4 mb-3">Dashboard</h3>
                        <div class="row">
                            <div class="col-12 col-md-4 ">
                                <div class="card border-2">
                                    <div class="card-body py-2">
                                        <h5 class="mb-2 fw-bold">
                                            Total Dental Clinics Registered
                                        </h5>
                                        <p class="mb-2 fw-bold">
                                            <?php 
                                                echo $adminObj->countClinics();
                                            ?>
                                            
                                        </p>
                                        <div class="mb-0">
                                            <span class="badge text-success me-2">
                                                +2.5%
                                            </span>
                                            <span class=" fw-bold">
                                                Since Last Month
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 ">
                                <div class="card  border-2">
                                    <div class="card-body py-2">
                                        <h5 class="mb-2 fw-bold">
                                            Total Patient Registered
                                        </h5>
                                        <p class="mb-2 fw-bold">
                                        <?php 
                                                echo $userObj->countUsers();
                                            ?>
                                        </p>
                                        <div class="mb-0">
                                            <span class="badge text-success me-2">
                                                1.5%
                                            </span>
                                            <span class="fw-bold">
                                                Since Last Month
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="fw-bold fs-4 my-3"> Recent Accounts
                        </h3>
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
                                        
                                        <tr>

                                        <?php 

                                        $array = $userObj->recentUsers();

                                        foreach($array as $arr){
                                        ?>
                                        
                                            <td><?= $arr['name']?></td>
                                            <td><?= $arr['email']?></td>
                                            <td><?= $arr['mobile_number']?></td>
                                            <td>                                         
                                                <form action="accounts/user_profile.php">
                                             
                                                    <button type="submit" class="btn btn-success" name = "button">View Account</button>

                                                </form>
                                            </td>                                 
                                          </tr>

                                        <?php }?>
                                    </tbody>
                                </table>
                              </div>
                        </div>

                        <h3 class="fw-bold fs-4 my-3"> Recent Dental Clinics
                        </h3>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="highlight">
                                            <th scope="col">Clinic Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                       
                                            <?php
                                            $clinics = $adminObj->recentClinics();
                                            foreach($clinics as $clinic){
                                                ?>
                                             <tr>
                                            <td><?= $clinic['clinic_name']?></td>

                                            <td>                           
                                            <button type="button" class="btn btn-success" data-clinic-id="<?=$clinic['clinic_name'];?>" onclick="acceptPatient(this.dataset.clinicId)" data-bs-toggle= "modal" data-bs-target="#deletebtn">
                                                View Account
                                            </button>        
                                          </td>     
                                          <?php 
                                            }
                                        ?>
                                        </tr>
                                    </tbody>
                                </table>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="../js/dashboard.js"></script>
</body>

</html>