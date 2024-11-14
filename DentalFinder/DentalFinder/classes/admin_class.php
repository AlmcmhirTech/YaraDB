<?php
require_once 'database.php';
require_once 'clinic_classes.php';

class Admin{

    public $clinic_name = '';
    public $clinic_email = '';
    public $mobile_number = '';
    public $password = '';
    public $license_code = '';
    public $clinic_address = '';

    public $status = 'Pending';
    public $acceptedStatus = 'Accepted';
    public $rejectedStatus = 'Rejected';

    public $service_name = '';
    public $pricing = '';
    public $duration= '';
    public $description = '';

    private $clinicObj;
    protected $adminconn;
    protected $clinicconn;

    function __construct(){ 
        $this->clinicconn = new Connection();
        $this->adminconn = new AdminConnection();
        $this->clinicObj = new Clinic();
    }

    public function deleteClinic($clinic_id){

        $sql = "DELETE FROM clinics_services WHERE clinic_id = :clinic_id;";
        $prepsql = $this->clinicconn->connect()->prepare($sql);
        $prepsql->bindParam(':clinic_id', $clinic_id);

        if($prepsql->execute()){

        $sql = "DELETE FROM clinics WHERE clinic_id = :clinic_id;";
        $prepsql = $this->clinicconn->connect()->prepare($sql);
        $prepsql->bindParam(':clinic_id', $clinic_id);

        return $prepsql->execute();
        }
    }

    public function deleteUser($user_id){
        $sql = "DELETE FROM users WHERE user_id = :user_id;";
        $prepsql = $this->clinicconn->connect()->prepare($sql);
        $prepsql->bindParam(':user_id', $user_id);

        return $prepsql->execute();
    }

    public function deleteClinicRequest($pending_id){

        $sql = "DELETE FROM admin_clinics_services WHERE pending_id = :pending_id;";
        $prepsql = $this->adminconn->connect()->prepare($sql);
        $prepsql->bindParam(':pending_id', $pending_id);

        if($prepsql->execute()){

        $sql = "DELETE FROM admin_clinics WHERE pending_id = :pending_id;";
        $prepsql = $this->adminconn->connect()->prepare($sql);
        $prepsql->bindParam(':pending_id', $pending_id);

        return $prepsql->execute();
        }
    }
    public function ConfirmClinic($pending_id){
        $sql = "SELECT * FROM admin_clinics WHERE pending_id = :pending_id;";
    
        $prepsql = $this->adminconn->connect()->prepare($sql);
        $prepsql->bindParam(':pending_id', $pending_id);
        $prepsql->execute();

        $data = $prepsql->fetch(PDO::FETCH_ASSOC);

        if($data){
            $insertSql = "INSERT INTO clinics (clinic_name, clinic_email, password, mobile_number, license_code, clinic_address) VALUES (:clinic_name, :clinic_email, :password, :mobile_number, :license_code, :clinic_address)";
    
            $prepsql = $this->clinicconn->connect()->prepare($insertSql);
            $prepsql->bindParam(':clinic_name', $data['clinic_name']);
            $prepsql->bindParam(':clinic_email', $data['clinic_email']);
            $prepsql->bindParam(':password', $data['password']);
            $prepsql->bindParam(':mobile_number', $data['mobile_number']);
            $prepsql->bindParam(':license_code', $data['license_code']);
            $prepsql->bindParam(':clinic_address', $data['clinic_address']);

           
            if ($prepsql->execute()) {
        
                $clinic_id = $this->clinicconn->connect()->lastInsertId();
                $this->ConfirmServicesRequest($pending_id, $clinic_id);

                $deleteSql = "UPDATE admin_clinics SET status = :status WHERE pending_id = :pending_id";
                $prepsql = $this->adminconn->connect()->prepare($deleteSql);
                $prepsql->bindParam(':status', $this->acceptedStatus);
                $prepsql->bindParam(':pending_id', $pending_id);
                
                $prepsql->execute();
            }
      
        }
    }

    public function ConfirmServicesRequest($pending_id, $clinic_id) {

        $sql = "SELECT service_name FROM admin_clinics_services WHERE pending_id = :pending_id;";
        
        $prepsql = $this->adminconn->connect()->prepare($sql);
        $prepsql->bindParam(':pending_id', $pending_id);
        $prepsql->execute();

        $data = $prepsql->fetchAll(PDO::FETCH_ASSOC);

        if($data){

            $sql = "INSERT INTO clinics_services(clinic_id, service_name) 
            VALUES (:clinic_id, :service_name)";
            $prepsql = $this->clinicconn->connect()->prepare($sql);

            foreach ($data as $dt) {

                $prepsql->bindParam(':clinic_id', $clinic_id);
                $prepsql->bindParam(':service_name', $dt['service_name']);
                $prepsql->execute();
            }

        }
    }

    public function clinicData(){
        $sql = "SELECT a.*, s.service_name FROM admin_clinics a INNER JOIN admin_clinics_services s ON a.pending_id = s.pending_id;";

        $prepsql = $this->adminconn->connect()->prepare($sql);
        $prepsql->execute();

        return $prepsql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showClinic(){
        $sql = "SELECT * FROM clinics;";

        $prepsql = $this->clinicconn->connect()->prepare($sql);
        $prepsql->execute();

        return $prepsql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showUsers(){
        $sql = "SELECT user_id, CONCAT(first_name, ' ', middle_name, ' ', last_name) AS name,
        email, mobile_number FROM users;";

        $prepsql = $this->clinicconn->connect()->prepare($sql);
        $prepsql->execute();

        return $prepsql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showRequests(){
        $sql = "SELECT * FROM admin_clinics;";

        $prepsql = $this->adminconn->connect()->prepare($sql);
        $prepsql->execute();

        return $prepsql->fetchAll();

    }

    public function updateStatus($pending_id, $status){
        $sql = "UPDATE admin_clinics SET status = :status WHERE pending_id = :pending_id;";

        $prepsql = $this->adminconn->connect()->prepare($sql);
        $prepsql->bindParam(':status', $status);
        $prepsql->bindParam(':pending_id', $pending_id);

        return $prepsql->execute();
    }

    
    public function showClinics(){
        $sql = "SELECT * FROM clinics;";
        $prepsql = $this->clinicconn->connect()->prepare($sql);
        $prepsql->execute();

        return $prepsql->fetchAll();
    }

    public function recentClinics(){
        $sql = "SELECT clinic_id, clinic_name FROM clinics ORDER BY clinic_id DESC LIMIT 5;";
        $prepsql = $this->clinicconn->connect()->prepare($sql);
        $prepsql->execute();

        return $prepsql->fetchAll();
    }
    public function countClinics() {
        $sql = "SELECT COUNT(*) as total FROM clinics;"; // Use alias for clarity
        $prepsql = $this->clinicconn->connect()->prepare($sql);
        $prepsql->execute();
    
        // Fetch the count and return it
        $result = $prepsql->fetch(PDO::FETCH_ASSOC); // Fetch the result as an associative array
        return $result['total']; // Return the count
    }

    public function activityLog($user_id, $user_type, $activity_type){
        $sql = "INSERT INTO activity_logs (user_type, id, activity_type, ip_address, user_agent) VALUES (:user_type, :id, :activity_type, :ip_address, :user_agent);";
        $prepsql = $this->adminconn->connect()->prepare($sql);
        $prepsql->bindParam(':user_type', $user_type);
        $prepsql->bindParam(':id', $user_id);
        $prepsql->bindParam(':activity_type', $activity_type);
        $prepsql->bindParam(':user_agent', $_SERVER['HTTP_USER_AGENT']);
        $prepsql->bindParam(':ip_address', $_SERVER['REMOTE_ADDR']);

        return $prepsql->execute();
    }

    public function searchUsers($term){
        $sql = "SELECT user_id, CONCAT(first_name, ' ', middle_name, ' ', last_name) AS name, email, password, mobile_number
        FROM users
        WHERE CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE '%" . $term . "%'
        OR email LIKE '%" . $term . "%';";
        $prepsql = $this->clinicconn->connect()->prepare($sql);
        $prepsql->bindParam(':name', $term);
        $prepsql->bindParam(':email', $term);

        $prepsql->execute();

        return $prepsql->fetchAll();

    }

    public function filterClinics($location, $specialty){
        $sql = "SELECT clinic_id, clinic_name, clinic_email, mobile_number, license_code, clinic_address, specialty
        FROM clinics
        WHERE (:location = '' OR clinic_address LIKE :clinic_address)
        AND (:specialty = '' OR specialty LIKE :specialty);";

        $prepsql = $this->clinicconn->connect()->prepare($sql);
        $prepsql->bindParam(':clinic_address', $location);
        $prepsql->bindParam(':specialty', $specialty);

        $prepsql->execute();

        return $prepsql->fetchAll();
    }
}