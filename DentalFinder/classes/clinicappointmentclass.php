<?php
require_once 'database.php';

class ClinicAppointment{
    public $appointment_id = '';
    public $user_id = '';
    public $service_id = '';
    public $clinic_id = '';
    public $branch_id = '';
    public $appointment_date = '';
    public $set_time = '';
    public $status = 'Pending';

    protected $appconn; 

    function __construct(){
        $this->appconn = new Connection();
    }

    public function showBooking($clinic_id){
        $sql = "SELECT * FROM appointments WHERE clinic_id = :clinic_id;";
        $prepsql = $this->appconn->connect()->prepare($sql);
        $prepsql->bindParam(':clinic_id', $clinic_id);
        $prepsql->execute();

        return $prepsql->fetchAll();
    }

    public function showUserAppointments($user_id) {
        $sql = "SELECT a.*, c.clinic_name, s.service_name 
                FROM appointments a
                JOIN clinics c ON a.clinic_id = c.clinic_id
                JOIN services s ON a.service_id = s.service_id
                WHERE a.user_id = :user_id
                ORDER BY a.appointment_date DESC;"; // Optionally order by appointment date
        $prepsql = $this->appconn->connect()->prepare($sql);
        $prepsql->bindParam(':user_id', $user_id);
        $prepsql->execute();
    
        return $prepsql->fetchAll(PDO::FETCH_ASSOC); // Fetch as associative array for easier access
    }
    
    public function selectBranch($branch_id){
        $sql = "SELECT branch_address FROM branches WHERE branch_id = :branch_id;";
        $prepsql = $this->appconn->connect()->prepare($sql);
        $prepsql->bindParam(':branch_id', $branch_id);
        $prepsql->execute();

        return $prepsql->fetch();
    }
    public function selectUser($user_id){
        $sql = "SELECT CONCAT(first_name,' ', last_name) AS 'patient_name' FROM users WHERE user_id = :user_id;";
        $prepsql = $this->appconn->connect()->prepare($sql);
        $prepsql->bindParam(':user_id', $user_id);
        $prepsql->execute();

        return $prepsql->fetch();
    }
    public function selectServices($service_id){
        $sql = "SELECT service_name FROM services WHERE service_id = :service_id;";
        $prepsql = $this->appconn->connect()->prepare($sql);
        $prepsql->bindParam(':service_id', $service_id);
        $prepsql->execute();

        return $prepsql->fetch();
    }

    public function fetchServices($clinic_id){
        $sql = "SELECT c.*, s.* FROM clinics_services c JOIN services s ON c.service_id = s.service_id WHERE c.clinic_id = :clinic_id;";
        $prepsql = $this->appconn->connect()->prepare($sql);
        $prepsql->bindParam(':clinic_id', $clinic_id);
        $prepsql->execute();

        return $prepsql->fetchAll();
    }

    public function fetchBranches($clinic_id){
        $sql = "SELECT * FROM branches WHERE clinic_id = :clinic_id;";
        $prepsql = $this->appconn->connect()->prepare($sql);
        $prepsql->bindParam(':clinic_id', $clinic_id);
        $prepsql->execute();

        return $prepsql->fetchAll();
    }


    public function addBooking($user_id){
        $sql = "INSERT INTO appointments(user_id, appointment_date, service_id, set_time, clinic_id, branch_id, status) VALUES(:user_id, :appointment_date, :service_id, :set_time, :clinic_id, :branch_id, :status);";
        $prepsql = $this->appconn->connect()->prepare($sql);
        $prepsql->bindParam(':user_id', $user_id);
        $prepsql->bindParam(':appointment_date', $this->appointment_date);
        $prepsql->bindParam(':service_id', $this->service_id);
        $prepsql->bindParam(':set_time', $this->set_time);
        $prepsql->bindParam(':clinic_id', $this->clinic_id);
        $prepsql->bindParam(':branch_id', $this->branch_id);
        $prepsql->bindParam(':status', $this->status);

        $prepsql->execute();

        return $this->appconn->connect()->lastInsertId();
    }

    public function acceptPatient($id){
        $sql = "INSERT INTO records(appointment_id) VALUES (:appointment_id);";
        $prepsql = $this->appconn->connect()->prepare($sql);
        $prepsql->bindParam(":appointment_id", $id);
        
        if($prepsql->execute()){
            $status = $this->status = 'Confirmed';
            return $this->updateStatus($status, $id);
        }
    
    }

    public function updateStatus($status, $id) {
        $allowedValues = ['Pending', 'Confirmed'];
        if (!in_array($status, $allowedValues)) {
            throw new InvalidArgumentException("Invalid value for enum: $status");
        }
    
        $sql = "UPDATE appointments SET status = :status WHERE appointment_id = :appointment_id";
        $prepsql = $this->appconn->connect()->prepare($sql);
        $prepsql->bindParam(":status", $status);
        $prepsql->bindParam(":appointment_id", $id);
        
        return $prepsql->execute();
    }

    
}
