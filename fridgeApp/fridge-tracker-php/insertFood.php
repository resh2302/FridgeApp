<?php

require_once 'checkSession.php';
require_once 'classes/FridgeFood.php';
require_once 'classes/FreezerFood.php';
require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';

$id = $_SESSION['refID'];
$name = $_GET["itm_name_ans"];
$qty = $_GET["itm_name_qut"];
$cat = $_GET["itm_name_cat"];
$date = $_GET["itm_name_exp"];
$img = $_GET["imgurl-insert"];
$mac = $_GET['imgurl-insert'];

FB::log($mac. " ".$name);

if($mac == "fridge")
{
  $ff = new FridgeFood();
}
else{
  $ff = new FreezerFood();
}


$ff->insertFood($id, $name, $qty, $cat, $date, $img);
// header('Location: myRefrigerator.php');
header('Location: myRefrigerator.php?id='.$id.'&mac='.$mac);


?>