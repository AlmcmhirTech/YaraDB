<?php

require_once '../../../classes/clinic_classes.php';

session_start();

// if(!isset($_SESSION['clinic_login'])){
//         header('location: ../login/clinic_login.php');
// }

// if(isset($_GET['clinic_id'])){
//     $clinic_id = $_GET['clinic_id'];
// }

$clinics_services = $pricing = $duration = $description = '';
$countErr = 0;

$addServices = new Clinic;


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $clinics_services = implode(',', $_POST['services']);
    $pricing = htmlspecialchars($_POST['pricing'], ENT_QUOTES, 'UTF-8');
    $duration = htmlspecialchars($_POST['duration'], ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');

    if (empty($clinics_services)) {
        $clinics_servicesErr = "Required!";
        $countErr++;
    }
    if (empty($pricing)) {
        $pricingErr = "Required!";
        $countErr++;
    }
    if (empty($duration)) {
        $durationErr = "Required!";
        $countErr++;
    }
    if (empty($description)) {
        $descriptionErr = "Required!";
        $countErr++;
    }
    if ($countErr == 0) {

        $addServices->clinics_services = $clinics_services;
        $addServices->pricing = $pricing;
        $addServices->duration = $duration;
        $addServices->description = $description;

        $service_name = $clinics_services;

        $addServices->addServices($service_name);
    }
}

?>

<form action = "add_service.php" method = 'post'>
    <label for="services[]">Service Name:</label>
    <input type="text" name = "services[]" id="services">

    <label for="pricing">Price:</label>
    <input type="number" name = "pricing" id="pricing">

    <label for="duration">Estimated Duration:</label>
    <input type="number" name = "duration" id="minutes" placeholder="Minutes" min="1" max="1440"    >


    <label for="description">Description:</label>
    <textarea name = "description" id="description"></textarea>

    <button type="submit">Add Service</button>
</form>

