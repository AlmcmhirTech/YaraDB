<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dentist</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="dentist.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>

<body>

    <?php require_once '../sidebar.php';?>
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




                
                        <h3 class="fw-bold fs-4 my-3">Dentists</h3>
                        <div>
                          <button type="button" class="btn btn-success d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addbtn">
                            <i class="lni lni-circle-plus me-2"></i>
                                Add Dentist
                            </button> 

                            <!-- Modal for Adding Dentist -->
                            <div class="modal fade" id="addbtn" tabindex="-1" aria-labelledby="myModal1Label" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addDentist">Add Dentist</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Add your Dentist form here -->
                                            <form>

                                                <div class="mb-3">
                                                    <label for="dfName" class="form-label">First Name:</label>
                                                    <input type="text" class="form-control" id="dfName">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dmName" class="form-label">Middle Name:</label>
                                                    <input type="text" class="form-control" id="dmName">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dlName" class="form-label">Last Name:</label>
                                                    <input type="text" class="form-control" id="dlName">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="dNum" class="form-label">Contact #</label>
                                                    <input type="tel" class="form-control" id="dNum">
                                                </div>


                                                <label for="amnety" class="form-label">Specializations:</label>
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="General Dentistry" id="GenDen">
                                                        <label class="form-check-label" for="GenDen">
                                                            General Dentistry
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Orthodontics" id="orthodontics">
                                                        <label class="form-check-label" for="orthodontics">
                                                            Orthodontics
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Periodontics" id="periodontics">
                                                        <label class="form-check-label" for="periodontics">
                                                            Periodontics
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Endodontics" id="endodontics">
                                                        <label class="form-check-label" for="endodontics">
                                                            Endodontics
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Prosthodontics" id="prosthodontics">
                                                        <label class="form-check-label" for="prosthodontics">
                                                            Prosthodontics
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Oral and Maxillofacial Surgery" id="OMS">
                                                        <label class="form-check-label" for="OMS">
                                                            Oral and Maxillofacial Surgery
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Pediatric Dentistry" id="pediatric_dentistry">
                                                        <label class="form-check-label" for="pediatric_dentistry">
                                                            Pediatric Dentistry
                                                        </label>
                                                    </div>
                                                    
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Oral Pathology" id="oral_pathology">
                                                        <label class="form-check-label" for="oral_pathology">
                                                            Oral Pathology
                                                        </label>
                                                    </div>
                                                    
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Cosmetic Dentistry" id="cosmetic_dentistry">
                                                        <label class="form-check-label" for="cosmetic_dentistry">
                                                            Cosmetic Dentistry
                                                        </label>
                                                    </div>
                                                    
                                                </div>


                                                <!-- Dentist Availability -->
                                                <h5>Availability</h5>
                                                <div id="availability">
                                                    <div class="mb-3">
                                                        <label for="days" class="form-label">Select Days:</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="monday" value="Monday">
                                                            <label class="form-check-label" for="monday">Monday</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="tuesday" value="Tuesday">
                                                            <label class="form-check-label" for="tuesday">Tuesday</label>
                                                        </div>
                                                        
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="wednesday" value="Wednesday">
                                                            <label class="form-check-label" for="wednesday">Wednesday</label>
                                                        </div>
                                                        
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="thursday" value="Thursday">
                                                            <label class="form-check-label" for="thursday">Thursday</label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="friday" value="Friday">
                                                            <label class="form-check-label" for="friday">Friday</label>
                                                        </div>
                                                        
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="saturday" value="Saturday">
                                                            <label class="form-check-label" for="saturday">Saturday</label>
                                                        </div>
                                                        
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="sunday" value="Sunday">
                                                            <label class="form-check-label" for="sunday">Sunday</label>
                                                        </div>

                                                    </div>
                                                
                                                    <!-- Time input for selected days -->
                                                    <div class="mb-3">
                                                        <label for="startTime" class="form-label">Start Time</label>
                                                        <input type="time" class="form-control" id="startTime">
                                                    </div>
                                                
                                                    <div class="mb-3">
                                                        <label for="endTime" class="form-label">End Time</label>
                                                        <input type="time" class="form-control" id="endTime">
                                                    </div>

                                                
                                                    <!-- Years of Experience -->
                                                    <div class="mb-3">
                                                        <label for="yearsExperience" class="form-label">Years of Experience</label>
                                                        <input type="number" class="form-control" id="yearsExperience" placeholder="Enter number of years" min="0" max="50"
                                                            step="1">
                                                    </div>
                       
                                                </div>



                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save Dentist</button>
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
                                            <th scope="col">No</th>
                                            <th scope="col">Dentist Name</th>
                                            <th scope="col">Contact Information</th>
                                            <th scope="col">Availability</th>
                                            <th scope="col">Years of Experience</th>                                            
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>John Mark Calilig</td>
                                            <td>09269371241</td>
                                            <td>
                                                <ul class="amnetyAlign">
                                                    <li>Monday: 09:00 AM - 05:00 PM</li>
                                                    <li>Wednesday: 09:00 AM - 05:00 PM</li>

                                                </ul>
                                            </td>
                                            <td>5</td>
                                            <td>      
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit1">
                                                Edit
                                            </button>                                  
                                                  <div class="modal fade" id="edit1" tabindex="-1" aria-labelledby="myModal1Label" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModal1Label">Edit Property</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Add your dentist form here -->
                                                                <form>
                    
                                                <div class="mb-3">
                                                    <label for="dfName" class="form-label">First Name:</label>
                                                    <input type="text" class="form-control" id="dfName">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dmName" class="form-label">Middle Name:</label>
                                                    <input type="text" class="form-control" id="dmName">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dlName" class="form-label">Last Name:</label>
                                                    <input type="text" class="form-control" id="dlName">
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="dNum" class="form-label">Contact #</label>
                                                    <input type="tel" class="form-control" id="dNum">
                                                </div>
                                                
                                                
                                                <label for="amnety" class="form-label">Specializations:</label>
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="General Dentistry" id="GenDen">
                                                        <label class="form-check-label" for="GenDen">
                                                            General Dentistry
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Orthodontics" id="orthodontics">
                                                        <label class="form-check-label" for="orthodontics">
                                                            Orthodontics
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Periodontics" id="periodontics">
                                                        <label class="form-check-label" for="periodontics">
                                                            Periodontics
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Endodontics" id="endodontics">
                                                        <label class="form-check-label" for="endodontics">
                                                            Endodontics
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Prosthodontics" id="prosthodontics">
                                                        <label class="form-check-label" for="prosthodontics">
                                                            Prosthodontics
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Oral and Maxillofacial Surgery" id="OMS">
                                                        <label class="form-check-label" for="OMS">
                                                            Oral and Maxillofacial Surgery
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Pediatric Dentistry" id="pediatric_dentistry">
                                                        <label class="form-check-label" for="pediatric_dentistry">
                                                            Pediatric Dentistry
                                                        </label>
                                                    </div>
                                                
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Oral Pathology" id="oral_pathology">
                                                        <label class="form-check-label" for="oral_pathology">
                                                            Oral Pathology
                                                        </label>
                                                    </div>
                                                
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Cosmetic Dentistry" id="cosmetic_dentistry">
                                                        <label class="form-check-label" for="cosmetic_dentistry">
                                                            Cosmetic Dentistry
                                                        </label>
                                                    </div>
                                                
                                                </div>
                                                
                                                
                                                <!-- Dentist Availability -->
                                                <h5>Availability</h5>
                                                <div id="availability">
                                                    <div class="mb-3">
                                                        <label for="days" class="form-label">Select Days:</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="monday" value="Monday">
                                                            <label class="form-check-label" for="monday">Monday</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="tuesday" value="Tuesday">
                                                            <label class="form-check-label" for="tuesday">Tuesday</label>
                                                        </div>
                                                
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="wednesday" value="Wednesday">
                                                            <label class="form-check-label" for="wednesday">Wednesday</label>
                                                        </div>
                                                
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="thursday" value="Thursday">
                                                            <label class="form-check-label" for="thursday">Thursday</label>
                                                        </div>
                                                
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="friday" value="Friday">
                                                            <label class="form-check-label" for="friday">Friday</label>
                                                        </div>
                                                
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="saturday" value="Saturday">
                                                            <label class="form-check-label" for="saturday">Saturday</label>
                                                        </div>
                                                
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="sunday" value="Sunday">
                                                            <label class="form-check-label" for="sunday">Sunday</label>
                                                        </div>
                                                
                                                    </div>
                                                
                                                    <!-- Time input for selected days -->
                                                    <div class="mb-3">
                                                        <label for="startTime" class="form-label">Start Time</label>
                                                        <input type="time" class="form-control" id="startTime">
                                                    </div>
                                                
                                                    <div class="mb-3">
                                                        <label for="endTime" class="form-label">End Time</label>
                                                        <input type="time" class="form-control" id="endTime">
                                                    </div>
                                                
                                                
                                                    <!-- Years of Experience -->
                                                    <div class="mb-3">
                                                        <label for="yearsExperience" class="form-label">Years of Experience</label>
                                                        <input type="number" class="form-control" id="yearsExperience" placeholder="Enter number of years" min="0"
                                                            max="50" step="1">
                                                    </div>
                                                
                                                </div>
                    
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Save Property</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                    
                                              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletebtn">
                                                Delete
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="dentist.js"></script>


    
</body>

</html>