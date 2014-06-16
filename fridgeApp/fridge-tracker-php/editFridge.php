<?php

require_once 'checkSession.php';
require_once 'classes/FridgeFood.php';
require_once 'classes/FreezerFood.php';
require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';

$action = $_GET["action"];
$id = $_GET["ID"];
$name = $_GET["itm_name_ans"];
$qty = $_GET["itm_name_qut"];
$cat = $_GET["itm_name_cat"];
$date = $_GET["itm_name_exp"];
$img = $_GET["imgurl-edit"];
$mac = $_GET['mac'];

if($mac == "fridge")
{
  $ff = new FridgeFood();
}
else{
  $ff = new FreezerFood();
}

if($action == "delete")
{
	if($ff->deleteFood($id))
	{ 
		echo "success";
	}
	else{
		echo "fail";
	}

}
else if ($action == "update"){
	$ff->updateFood($id, $name, $qty, $cat, $date, $img);
	header('Location: myRefrigerator.php?id='.$id.'&mac='.$mac);
}

?>