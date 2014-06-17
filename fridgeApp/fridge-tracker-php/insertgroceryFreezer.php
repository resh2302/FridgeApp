<?php
require_once 'classes/FridgeDB.php';
require_once 'checkSession.php';
require_once 'classes/groceryClass.php';
require_once 'classes/FridgeFood.php';
require_once 'classes/FreezerFood.php';
require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';

$id = $_SESSION['refID'];
$itemname = $_POST["itemname"];


$gc = new groceryClass();
$row = $gc->InsertFreezer($itemname,$id); // $id, 
//echo "title: $title. content: $content";


// header('Location: myRefrigerator.php');
header('Location: groceryFreezer.php');


?>

