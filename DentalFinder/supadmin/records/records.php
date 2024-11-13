<th>Clinic</th>
<th>Email</th>
<th>Contact</th>
<th>License</th>
<th>Address</th>
<th>CreatedAt</th>

<?php

require_once '../../classes/admin_class.php';

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

<?php

}
?>

<th>First Name</th>
<th>Middle Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Contact</th>

<?php

foreach($users as $arr){
    ?>
        <td><?= $arr['first_name']?></td>
        <td><?= $arr['middle_name']?></td>
        <td><?= $arr['last_name']?></td>
        <td><?= $arr['email']?></td>
        <td><?= $arr['mobile_number']?></td>
    <?php
    
    }

?>

