<?php

require_once "../../database.php";

class PaymentMethod{

    public $payment_name = '';
    public $amount = 1000;
    public $payment_method_id = '';
    

    protected $paymentconn;

    function __construct(){
        $this->paymentconn = new Connection();
    }

    public function fetchPayments(){
        $sql = "SELECT * FROM payment_method;";
        $prepsql = $this->paymentconn->connect()->prepare($sql);
        $prepsql->execute();

        return $prepsql->fetchAll();
    }

    public function addPayment($appointment_id, $payment_method){
        $sql = "INSERT INTO payments(appointment_id, amount, payment_method) VALUES(:appointment_id, :amount, :payment_method);";
        $prepsql = $this->paymentconn->connect()->prepare($sql);

        $prepsql->bindParam(':appointment_id', $appointment_id);
        $prepsql->bindParam(':amount', $this->amount);
        $prepsql->bindParam(':payment_method', $payment_method);

        return $prepsql->execute();
    }

    public function getPaymentById($payment_method_id) {
        // SQL query to select payment name based on payment method ID
        $sql = "SELECT payment_name FROM payment_method WHERE payment_method_id = :payment_method_id;";
        
        // Prepare the SQL statement
        $prepsql = $this->paymentconn->connect()->prepare($sql);
        
        // Bind the parameter
        $prepsql->bindParam(':payment_method_id', $payment_method_id, PDO::PARAM_INT);
        
        // Execute the query
        $prepsql->execute();

        // Fetch the result as an associative array
        return $prepsql->fetch(PDO::FETCH_ASSOC);
    }
}