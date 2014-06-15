<?php

require_once 'FridgeDB.php';
require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';
define("ENCRYPTION_KEY", "!@^&*S!@#A!@#L!@#T#$%");

class user {

    public $email;
    public $password;
    public $userid;
    public $firstname;
    public $lastname;
    public $avatar;
    public $token;
    public $activationStatus;
    public $refrigeratorID;

    public function getUser() {
        $db = FridgeDB::getDB();
        $q = "SELECT * FROM users WHERE id = :userid";
        $stm = $db->prepare($q);

        $stm->bindParam(':userid', $this->userid);

        $stm->execute();

        $user = $stm->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $this->userid = null;
            return false;
        } else {
            $this->userid = $user["id"];
            $this->firstname = $user["FirstName"];
            $this->lastname = $user["LastName"];
            $this->avatar = $user["Avatar"];
            $this->email = $user["email"];
            $this->token = $user["remember_token"];
            $this->refrigeratorID = $user["RefrigeratorID"];
            return true;
        }

        return false;
    }

    // get user by id for invitation - could not use the above
    public function getUserbyID($userID) {
        $db = FridgeDB::getDB();
        $q = "SELECT * FROM users WHERE id = :userid";
        $stm = $db->prepare($q);

        $stm->bindParam(':userid', $userID);

        $stm->execute();

        $user = $stm->fetchAll();
        return $user;
    }
    // get user by by token for activation
    public function getUserbyToken($token) {
        $db = FridgeDB::getDB();
        $q = "SELECT * FROM users WHERE remember_token = :token";
        $stm = $db->prepare($q);

        $stm->bindParam(':token', $token);

        $stm->execute();

        $user = $stm->fetchAll();
        return $user;
    }
    
    //update activationStatus
    public function activateUser($userid)
    {
        $action = "Activated";
        $db = FridgeDB::getDB();
        $q = "UPDATE users SET activationStatus = :status  WHERE id = :userid";
        $stm = $db->prepare($q);
        
        $stm->bindParam(':status', $action);
        $stm->bindParam(':userid', $userid);
        
        $row = $stm->execute();
        
        return $row;
        
    }


    //login to the system, if the user exists, return true, otherwise return false
    public function login() {
        $db = FridgeDB::getDB();
        $q = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stm = $db->prepare($q);

        $stm->bindParam(':email', $this->email, PDO::PARAM_STR, 255);
        $stm->bindParam(':password', $this->password, PDO::PARAM_STR, 255);
        $stm->execute();

        $user = $stm->fetch(PDO::FETCH_ASSOC);

        //if not return a row from the database, means the use doesn't exist
        if (!$user) {
            $this->userid = null;
            return false;
        }
        //otherwise the user exist, set the user information
        else {
            
                $this->userid = $user["id"];
                $this->firstname = $user["FirstName"];
                $this->lastname = $user["LastName"];
                $this->avatar = $user["Avatar"];
                $this->email = $user["email"];
                $this->refrigeratorID = $user["RefrigeratorID"];
                return true;
            
        }

        //in case anything wrong, return false
        return false;
    }

    //check email for registration
    public function checkEmail($email) {
        $db = FridgeDB::getDB();
        $q = "SELECT * FROM users ORDER BY id";
//        $repeat = false;
        $stm = $db->query($q);
//         $stm = $db->prepare($q);
        //    $stm->execute();        

        $stm->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stm->fetch()) {
            // FB::log($row['email']." == ".$email);
            if ($row['email'] == $email) {
                return true;
            }
        }

        return false;
    }

    //register user 
    public function firstRegistration($email, $password, $avatar) {
        FB::log("here in user.php");
        $token = $this->generateRandomString();
        $status = "Pending";


        $db = FridgeDB::getDB();

        //get max refrigeratorId and increment
        $q1 = "SELECT MAX(RefrigeratorID) FROM users";
        $stm1 = $db->prepare($q1);

        $stm1->execute();

        $refID = $stm1->fetch();

        FB::log("refID max = ".$refID[0]);

        $refrigeratorID = $refID[0] + 1;

        $q = "INSERT INTO users 
        (email,password,Avatar,remember_token, activationStatus, RefrigeratorID)
        VALUES
        (:email,:pwd, :avatar, :token, :actStatus, :refID)";
        $stm = $db->prepare($q);

        $stm->bindParam(':email', $email);
        $stm->bindParam(':pwd', $password);
        $stm->bindParam(':avatar', $avatar);
        $stm->bindParam(':token', $token);
        $stm->bindParam(':actStatus', $status);
        $stm->bindParam(':refID', $refrigeratorID);

        $row = $stm->execute();
    
        return $row;
    }

    //autologin after invitation to current user
    
    public function autoLogin() {
        $db = FridgeDB::getDB();
        $q = "SELECT * FROM users WHERE email = :email";
        $stm = $db->prepare($q);
        $stm->bindParam(':email', $this->email, PDO::PARAM_STR, 255);
        $stm->execute();

        $user = $stm->fetch(PDO::FETCH_ASSOC);
        
        if (!$user) {
            $this->userid = null;
            return false;
        }
         else {
            $this->userid = $user["id"];
            $this->firstname = $user["FirstName"];
            $this->lastname = $user["LastName"];
            $this->avatar = $user["Avatar"];
            $this->email = $user["email"];
            $this->refrigeratorID = $user["RefrigeratorID"];

            return true;
        }
        return false;
    }
    
    // update firstname and lastname
    public function autoUpdate($userid, $value, $field) {
        $db = FridgeDB::getDB();
        FB::log(" field : " . $field);
        if ($field == "fname") {
            $q = "UPDATE users SET FirstName = :firstname WHERE id = :userid";
            $stm = $db->prepare($q);
            $stm->bindParam(':firstname', $value);
        } elseif ($field == "lname") {
            $q = "UPDATE users SET LastName = :lastname WHERE id = :userid";
            $stm = $db->prepare($q);
            $stm->bindParam(':lastname', $value);
        } elseif ($field == "avatar") {
            FB::log(" avatar ");
            $q = "UPDATE users SET Avatar = :avatar WHERE id = :userid";
            $stm = $db->prepare($q);
            $stm->bindParam(':avatar', $value);
        }

        $stm->bindParam(':userid', $userid);
        $row = $stm->execute();
        FB::log("row : " . $row);
        return $row;
    }

    //change password

    public function changePwd($userid, $password) {
        $db = FridgeDB::getDB();
        $q = "UPDATE users SET password = :pwd WHERE id = :userid";
        $stm = $db->prepare($q);

        $stm->bindParam(':pwd', $password);
        $stm->bindParam(':userid', $userid, PDO::PARAM_INT);
        $row = $stm->execute();
        if ($row == 1) {
            return true;
        } else {
            return false;
        }
    }

    //set user name at the first time login
    public function setName($userid, $firstname, $lastname) {
        $db = FridgeDB::getDB();
        $q = "UPDATE users SET FirstName = :firstname, LastName= :lastname WHERE id = :userid";
        $stm = $db->prepare($q);

        $validation = new serverValidation();
        $validation->checkEmptyString($firstname);
        $validation->checkStringLength($firstname, 50);
        $validation->checkEmptyString($lastname);
        $validation->checkStringLength($lastname, 50);    
        
        $stm->bindParam(':firstname', $firstname, PDO::PARAM_STR, 50);
        $stm->bindParam(':lastname', $lastname, PDO::PARAM_STR, 50);
        $stm->bindParam(':userid', $userid, PDO::PARAM_INT);
        $row = $stm->execute();
        if ($row == 1) {
            return true;
        } else {
            return false;
        }
    }

   

    // used for encrypting all the passwords in the table
    public function readDataForwards() {
        $db = FridgeDB::getDB();
        $sql = 'SELECT password FROM users ORDER BY id';
        try {
            $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                $this->encryptAll($row[0]);
            }
            $stmt = null;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    // used for encrypting password and setting avatar to default
    public function encryptAll($password) {
        $db = FridgeDB::getDB();
        $q = "UPDATE users
              SET password= :Epass, Avatar= :avatar
              WHERE password= :pass";

        $encryptedPwd = crypt($password, ENCRYPTION_KEY);

        $stm = $db->prepare($q);
        $stm->bindParam(':pass', $password);
        $stm->bindValue(':avatar', "/img/users/default.png");

        $stm->bindParam(':Epass', $encryptedPwd);
        $row = $stm->execute();
    }

    //generate a random string, it can be used for password reset, default lenght is 10
    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    //send an email with HTML format, set the from and reply-to as "noreply@bonvoyage.webmaster"
    private function sendHTMLEmail($to, $subject, $message) {
        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: reshma@reshmamathew.com' . "\r\n";
        $headers .= 'Reply-To: reshma@reshmamathew.com' . "\r\n";

        mail($to, $subject, $message, $headers);
    }

    

    //verify the reset password token with email
    public function verifyResetPasswordToken($email, $token) {
        $db = FridgeDB::getDB();
        $q = "SELECT * FROM users WHERE email = :email AND remember_token = :token";
        $stm = $db->prepare($q);
        $stm->bindParam(':email', $email, PDO::PARAM_STR, 255);
        $stm->bindParam(':token', $token, PDO::PARAM_STR, 255);
        $stm->execute();

        $user = $stm->fetch(PDO::FETCH_ASSOC);

        //if no record return, means the email and token not match, return false
        if (!$user) {
            return false;
        } else {
            return true;
        }
    }

   

}
