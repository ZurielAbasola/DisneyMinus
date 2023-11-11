<?php
class Account {
    private $con;
    private $errorArray = array();

    public function __construct($con) {
        $this->con = $con;
    }
    
    public function register($fn, $ln, $un, $em, $em2, $pw, $pw2) {
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateUsername($un);
        $this->validateEmails($em, $em2);
        $this->validatePasswords($pw, $pw2);
        
        if(empty($this->errorArray)) {
            // Insert into db
            return $this->insertUserDetails($fn, $ln, $un, $em, $pw);
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

    public function insertUserDetails($fn, $ln, $un, $em, $pw) {
        $pw = hash("sha512", $pw);

        $query = $this->con->prepare("INSERT INTO users (firstName, lastName, username, email, password) 
                                        VALUES (:fn, :ln, :un, :em, :pw)");
        $query->bindValue(":fn", $fn);
        $query->bindValue(":ln", $ln);
        $query->bindValue(":un", $un);
        $query->bindValue(":em", $em);
        $query->bindValue(":pw", $pw);

        return $query->execute();
    }

    private function validateFirstName($fn) {}

    private function validateLastName($ln) {}

    private function validateUsername($un) {}

    private function validateEmails($em, $em2) {}

    private function validatePasswords($pw, $pw2) {}

    public function getError($error) {}
}

?>