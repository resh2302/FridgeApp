<?php
    require_once "classes/FridgeDB.php";
    require_once "classes/user.php";
    require_once "FirePHPCore-0.3.2/lib/FirePHPCore/fb.php";
    

    $email = $_POST['email'];
    $password = $_POST['password'];
    $avatar = "img/users/default.png";    
    
    $user = new user(); 
    FB::log("in reg php");
    
    $encryptedPwd = crypt($password, ENCRYPTION_KEY);
    FB::log($encryptedPwd);
    
    $status = $user->firstRegistration($email, $encryptedPwd, $avatar);

    FB::log("status".$status);
    echo $status;
 
?>