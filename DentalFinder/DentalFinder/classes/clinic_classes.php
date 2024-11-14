<?php
require_once 'database.php';
require_once 'admin_class.php';

class Clinic{
    public $clinic_id = 1;
    public $clinic_name = '';
    public $clinic_email = '';
    public $password = '';
    public $passwordRepeat = '';
    public $mobile_number = '';
    public $service_id = '';
    public $payment = '';
    public $license_code = '';
    public $clinic_address = '';

    public $branch_address = '';

    public $clinics_services = '';
    public $pricing = '';
    public $duration = '';
    public $description = '';

    public $status = 'Pending';

    protected $clinicconn;
    protected $adminconn;

    function __construct(){
        $this->clinicconn = new Connection();
        $this->adminconn = new AdminConnection();
    }
    

    public function addClinicRequest($passwordHash){
        $sql = "INSERT INTO admin_clinics (clinic_name, clinic_email, password, mobile_number, license_code, clinic_address,status) VALUES (:clinic_name, :clinic_email, :password, :mobile_number, :license_code, :clinic_address, :status)";
    
        $prepsql = $this->adminconn->connect()->prepare($sql);
        $prepsql->bindParam(':clinic_name', $this->clinic_name);
        $prepsql->bindParam(':clinic_email', $this->clinic_email);
        $prepsql->bindParam(':password', $passwordHash);
        $prepsql->bindParam(':mobile_number', $this->mobile_number);
        $prepsql->bindParam(':license_code', $this->license_code);
        $prepsql->bindParam(':clinic_address', $this->clinic_address);
        $prepsql->bindParam(':status', $this->status);

        $prepsql->execute();
        
        return $this->adminconn->connect()->lastInsertId();
    }
    public function selectServices(){
        $sql = "SELECT service_id, service_name FROM services;"; 
        $prepsql = $this->clinicconn->connect()->prepare($sql);
        $prepsql->execute();
    
        return $prepsql->fetchAll(PDO::FETCH_ASSOC); 
    }
    
    
    public function addServicesRequest($pending_id, $service_names){
        $sql = "INSERT INTO admin_clinics_services(pending_id, service_name) 
        VALUES (:pending_id, :service_name);";
        $prepsql = $this->adminconn->connect()->prepare($sql);
        
        foreach ($service_names as $service_name) {

            $prepsql->bindParam(':service_name', $service_name);
            $prepsql->bindParam(':pending_id', $pending_id);

            $prepsql->execute();
        }
    
        return true; 
    }
    
    
    public function emailExists($clinic_email){
        $sql = "SELECT COUNT(*) FROM clinics WHERE clinic_email = :clinic_email";
        $prepsql = $this->clinicconn->connect()->prepare($sql);
        $prepsql->bindParam(':clinic_email', $clinic_email);
        $prepsql->execute();
        $count = $prepsql->fetchColumn();

        return $count;
    }

    public function loginClinic($clinic_email) {
        $sql = "SELECT * FROM clinics WHERE clinic_email = :clinic_email;";
        $prepsql = $this->clinicconn->connect()->prepare($sql);
        $prepsql->bindParam(':clinic_email', $clinic_email);
        $prepsql->execute();
        
        return $prepsql->fetch(PDO::FETCH_ASSOC);
    
    }

    public function addBranch($clinic_id){

        $sql = "INSERT INTO branches(clinic_id, license_code, mobile_number, branch_address)
        VALUES (:clinic_id, :license_code, :mobile_number, :branch_address);";
        $prepsql = $this->clinicconn->connect()->prepare($sql);

        $prepsql->bindParam(':clinic_id', $clinic_id);
        $prepsql->bindParam(':license_code', $this->license_code);
        $prepsql->bindParam(':mobile_number', $this->mobile_number);
        $prepsql->bindParam(':branch_address', $this->branch_address);


        return $prepsql->execute();
        
    }

    public function showBranches($clinic_id){

        $sql = "SELECT * FROM branches WHERE clinic_id = :clinic_id;";
        $prepsql = $this->clinicconn->connect()->prepare($sql);
        $prepsql->bindParam(':clinic_id', $clinic_id);
        $prepsql->execute();
        
        return $prepsql->fetchAll(PDO::FETCH_ASSOC);
    
    }

} 
?>
