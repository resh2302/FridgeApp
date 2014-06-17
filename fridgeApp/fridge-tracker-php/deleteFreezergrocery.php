<?php
require_once 'checkSession.php';
require_once 'classes/groceryClass.php';
require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';

$id = $_POST['ID'];


//
//echo "$id,$title, $content";
$gc = new groceryClass();
$status = $gc->deleteFreezer($id);
FB::log("status ".$status);
if($status){
    echo "success";
//    return "success";
}
else{
     echo "fail";
//    return "fail";
 }
?>

