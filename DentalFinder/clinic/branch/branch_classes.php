<?php
require_once "database.php";

class Branch{
    public $branch_name = '';
    public $mobile_number = '';
    public $services = '';
    public $payment = '';

    protected $branchconn;

    function __construct(){
        $this->branchconn = new Connection();
    }

    public function addBranch(){
        $sql = "INSERT INTO branches (branch_name, mobile_number, payment) VALUES (:branch_name, :mobile_number, :payment)";
    
        $prepsql = $this->branchconn->connect()->prepare($sql);
        $prepsql->bindParam(':branch_name', $this->branch_name);
        $prepsql->bindParam(':mobile_number', $this->mobile_number);
        $prepsql->bindParam(':services', $this->services);
        $prepsql->bindParam(':payment', $this->payment);
        
        return $prepsql->execute();
    }
}