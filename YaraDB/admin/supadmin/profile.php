<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/style.css">
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
            <main class="content px-6 py-4">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card p-4" style="border: 1px solid #ccc; border-radius: 10px;">
                                <div class="card-body">
                                    <h5 class="card-title mb-4 text-center">Admin Details</h5>
                                    <div class="text-center mb-3">
                                        <img src="https://www.entrepreneurs.ng/wp-content/uploads/2019/06/Mark-Zuckerberg.jpg" class="img-fluid rounded-circle" style="width: 150px;">
                                    </div>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Name</th>
                                                <td>Mark Zuckerberg</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td>markzuckerberg@homies.com</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Role</th>
                                                <td>Admin</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal1">
                                            Edit
                                          </button>
                                     </div>


                                        <div class="modal" id="myModal1">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                        
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Are you sure you want to edit?</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                                                </div>
                                        
                                              <div class="modal-body">
                                                  <table class="table table-bordered">
                                                        <tr>
                                                          <th scope="row">Name</th>
                                                          <td>
                                                            <input type="text" class="form-control" id="adminName" value="Mark Zuckerberg">

                                                          </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Email</th>
                                                            <td>
                                                              <input type="email" class="form-control" id="adminEmail" value="markzukerberg@hoomies.com">

                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <th scope="row">Role</th>
                                                            <td>
                                                              <select class="form-select" id="roleSelect">
                                                                <option value="admin">Admin</option>
                                                                <option value="user">Sub-admin</option>
                                                              </select>
                                                            </td>
                                                          </tr>
                                                    </table>
                                              </div>
                                        
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Save Changes</button>
                                            </div>
                                        
                                            </div>
                                          </div>
                                        </div>
                                        
                                    </div>
                                </div>
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
    <script src="profile.js"></script>
</body>

</html>