<?php

    require_once "classes/FridgeDB.php";
    require_once "classes/user.php";
    require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';

if(isset($_POST['email'])){
    $email = $_POST['email'];

    $user = new user();
    if($user->checkEmail($email))
    {
        echo "repeat";
    }
    else{
        echo "noRepeat";
    }
}   