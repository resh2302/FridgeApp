<?php

// require_once 'globals.php';
require_once "classes/user.php";
require_once './FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';

FB::log("Enter do login");
$email = $_POST["email"];
$password = $_POST["password"];

$user = new user();
$user->email = $email;
// $user->password = $password;

//to check password - encrypt password and test
$encryptedPwd = crypt($password, ENCRYPTION_KEY);
$user->password = $encryptedPwd;
FB::log($encryptedPwd);

$returnMsg = $user->login();

if ($returnMsg == "true")
{
    session_start();
    $_SESSION['userid']=$user->userid;
    $_SESSION['firstname']=$user->firstname;
    $_SESSION['lastname']=$user->lastname;
    $_SESSION['avatar']=$user->avatar;
    $_SESSION['email']= $user->email;
    $_SESSION['refID']=$user->refrigeratorID;
    echo "success";
}
else
{
    echo "fail";
}

?>