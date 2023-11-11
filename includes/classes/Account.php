<?php
class Account {
    private $con;
    private $errorArray = array();

    public function __construct($con) {
        $this->con = $con;
    }
    
    public function register($fn, $ln, $em, $em2, $pw, $pw2) {
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmails($em, $em2);
        $this->validatePasswords($pw, $pw2);
        
        if(empty($this->errorArray)) {
            // Insert into db
            return $this->insertUserDetails($fn, $ln, $em, $pw);
        }
        else {
            return false;
        }
    }

    public function login($em, $pw) {
        $pw = hash("sha512", $pw);
        
        $query = $this->con->prepare("SELECT * FROM users WHERE email=:em AND password=:pw");
        $query->bindValue(":em", $em);
        $query->bindValue(":pw", $pw);
        
        $query->execute();
        
        if($query->rowCount() == 1) {
            return true;
        }
        else {
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }
    }
}

?>