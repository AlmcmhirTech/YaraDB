<th>Clinic</th>
<th>Email</th>
<th>Contact</th>
<th>License</th>
<th>Address</th>
<th>CreatedAt</th>

<?php

require_once '../../classes/admin_class.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $adminObj = new Admin();

    if (isset($_POST['ubutton'])) {

        if($_POST['ubutton'] == 'Delete'){
            $user_id = $_POST['user_id'];
            $adminObj->deleteUser($user_id);
        }
    }

      if (isset($_POST['cbutton'])) {

        if($_POST['cbutton'] == 'Delete'){
            $clinic_id = $_POST['clinic_id'];
            $adminObj->deleteClinic($clinic_id);
        }
    }

}

$adminObj = new Admin;

$clinics = $adminObj->showClinic();
$users = $adminObj->showUsers();

foreach($clinics as $arr){
?>
    <td><?= $arr['clinic_name']?></td>
    <td><?= $arr['clinic_email']?></td>
    <td><?= $arr['mobile_number']?></td>
    <td><?= $arr['license_code']?></td>
    <td><?= $arr['clinic_address']?></td>
    <td><?= $arr['createdAt']?></td>
    <form action="records.php" method = 'post'>
            <input type="hidden" name="clinic_id" value="<?= $arr['clinic_id'] ?>">
            <button type="submit" class="btn btn-danger" name = "cbutton" value = "Delete">Delete</button>
    </form>

<?php

}
?>

<th>First Name</th>
<th>Middle Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Contact</th>
<th>Action</th>

<?php

foreach($users as $arr){
    ?>
        <td><?= $arr['first_name']?></td>
        <td><?= $arr['middle_name']?></td>
        <td><?= $arr['last_name']?></td>
        <td><?= $arr['email']?></td>
        <td><?= $arr['mobile_number']?></td>
        <form action="records.php" method = 'post'>
            <input type="hidden" name="user_id" value="<?= $arr['user_id'] ?>">
            <button type="submit" class="btn btn-danger" name = "ubutton" value = "Delete">Delete</button>
        </form>
    <?php
    
    }

?>

