<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find a Clinic</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
</head>

<body class="find-clinic">

    <!-- NAVIGATOR BAR -->
    <?php require_once("navigator.php"); ?>


    <section class="single-booking container my-5 pt-5">
        <div class="row">

            <div class="form-container">
                <h1 class="text-center">Looking for a clinic?</h1>
                <hr class="mx-auto" style="width: 50px;">

                <!-- Appointment Form -->
                <form id="appointment-form">
                    <div class="form-group mb-3">
                        <label for="near-me">Clinic Near Me:</label>
                        <select class="form-control" id="location" name="near-me">
                            <option value="" disabled selected>Select Location</option>
                            <option>Location 1</option>
                            <option>Location 2</option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="service">Service:</label><br>
                        <select class="form-control" id="service" name="service" required>
                            <option value="" disabled selected>Select Service</option>
                            <option>Teeth Cleaning</option>
                            <option>Teeth Whitening</option>
                            <option>Orthodontics</option>
                            <option>Root Canal</option>
                            <option>Dental Implants</option>
                            <option>Tooth Extraction</option>
                            <option>Fillings and Repairs</option>
                            <option>Dental Checkup</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="least-most">Least Appointment/Most Appointment:</label>
                        <select class="form-control" id="least-most" name="least-most">
                            <option value="" disabled selected>Select Choice</option>
                            <option>Least Appointment</option>
                            <option>Most Appointment</option>
                        </select>
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary book-btn" value="Find a Clinic">
                    </div>
                </form>
            </div>

        </div>

        <!-- Clinic Results Section -->
        <div id="clinic-results" class="mt-5" style="display: none;">
            <h3 class="text-center">Available Clinics</h3>
            <div id="clinic-list" class="list-group">
                <!-- Clinic list will be populated here -->
            </div>
        </div>
    </section>


    <?php require_once("footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Handle form submission to show clinic results
        document.getElementById("appointment-form").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form from submitting

            // Get form values
            const location = document.getElementById("location").value;
            const service = document.getElementById("service").value;
            const appointmentType = document.getElementById("least-most").value;

            // Simple validation to check if all fields are selected
            if (location && service && appointmentType) {
                // Show the clinic results section
                document.getElementById("clinic-results").style.display = "block";

                // Get the clinic list container
                const clinicList = document.getElementById("clinic-list");

                // Clear any previous results
                clinicList.innerHTML = "";

                // For now, add mock clinic data
                const clinics = [{
                        name: "Clinic A",
                        location: "Location 1",
                        service: "Teeth Cleaning",
                        appointmentType: "Most Appointment"
                    },
                    {
                        name: "Clinic B",
                        location: "Location 2",
                        service: "Dental Implants",
                        appointmentType: "Least Appointment"
                    },
                    {
                        name: "Clinic C",
                        location: "Location 1",
                        service: "Orthodontics",
                        appointmentType: "Most Appointment"
                    }
                ];

                // Filter clinics based on user selection (example)
                const filteredClinics = clinics.filter(clinic =>
                    clinic.location === location &&
                    clinic.service === service &&
                    clinic.appointmentType === appointmentType
                );

                // Populate the clinic list
                if (filteredClinics.length > 0) {
                    filteredClinics.forEach(clinic => {
                        const clinicItem = document.createElement("div");
                        clinicItem.classList.add("list-group-item");
                        clinicItem.classList.add("list-group-item-action");
                        clinicItem.textContent = `${clinic.name} - ${clinic.service} (${clinic.appointmentType})`;
                        clinicList.appendChild(clinicItem);
                    });
                } else {
                    clinicList.innerHTML = "<p>No clinics found for your selection.</p>";
                }
            } else {
                alert("Please fill out all fields.");
            }
        });
    </script>
</body>

</html>