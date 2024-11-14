<?php
require_once "database.php";

class User{

    public $user_id = '';
    public $first_name = '';
    public $middle_name = '';
    public $last_name = '';
    public $email = '';
    public $password = '';
    public $passwordRepeat = '';
    public $mobile_number = '';
    public $rating = '';
    public $quality = '';
    public $comment = '';

    protected $userconn;

    function __construct(){
        $this->userconn = new Connection();
    }

    public function recentUsers(){
        $sql = "SELECT CONCAT(first_name, ' ', middle_name, ' ', last_name) AS name, email, mobile_number FROM users ORDER BY user_id DESC LIMIT 5;";
        $prepsql = $this->userconn->connect()->prepare($sql);
        $prepsql->execute();

        return $prepsql->fetchAll();
    }
    public function leaveReview($user_id, $clinic_id){

        if (in_array($this->rating, ['1', '2', '3', '4', '5'])) {

            $sql = "INSERT INTO user_reviews (user_id, clinic_id, rating, review, review_comment) VALUES (:user_id, :clinic_id, :rating, :review, :review_comment)";
        
            $prepsql = $this->userconn->connect()->prepare($sql);
            $prepsql->bindParam(':user_id', $user_id);
            $prepsql->bindParam(':clinic_id', $clinic_id);
            $prepsql->bindParam(':rating', $this->rating);
            $prepsql->bindParam(':review', $this->quality);
            $prepsql->bindParam(':review_comment', $this->comment);
 
            return $prepsql->execute();
        }
    }

    public function addUser($passwordHash){
        $sql = "INSERT INTO users (first_name, middle_name, last_name, email, password, mobile_number) VALUES (:first_name, :middle_name, :last_name, :email, :password, :mobile_number)";
    
        $prepsql = $this->userconn->connect()->prepare($sql);
        $prepsql->bindParam(':first_name', $this->first_name);
        $prepsql->bindParam(':middle_name', $this->middle_name);
        $prepsql->bindParam(':last_name', $this->last_name);
        $prepsql->bindParam(':email', $this->email);
        $prepsql->bindParam(':password', $passwordHash);
        $prepsql->bindParam(':mobile_number', $this->mobile_number); 
        
        return $prepsql->execute();
    }

    public function emailExists($email){
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $prepsql = $this->userconn->connect()->prepare($sql);
        $prepsql->bindParam(':email', $this->email);
        $prepsql->execute();
        $count = $prepsql->fetchColumn();

        return $count;
    }

    public function loginUser($email) {
        $sql = "SELECT * FROM users WHERE email = :email;";
        $prepsql = $this->userconn->connect()->prepare($sql);
        $prepsql->bindParam(':email', $email);
        $prepsql->execute();
         

        return $prepsql->fetch(PDO::FETCH_ASSOC);
    
    }
    public function countUsers() {
        $sql = "SELECT COUNT(*) as total FROM users;"; // Use alias for clarity
        $prepsql = $this->userconn->connect()->prepare($sql);
        $prepsql->execute();
    
        // Fetch the count and return it
        $result = $prepsql->fetch(PDO::FETCH_ASSOC); // Fetch the result as an associative array
        return $result['total']; // Return the count
    }

    public function userData(){
        $sql = "SELECT * FROM users;";

        $prepsql = $this->userconn->connect()->prepare($sql);
        $prepsql->execute();

        return $prepsql->fetchAll(PDO::FETCH_ASSOC);
    }
    

}