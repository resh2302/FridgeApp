<?php

require_once 'FridgeDB.php';
require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';


class FridgeFood {
	
	public function getFood($id)
	{
		$db = FridgeDB::getDB();
                $q = "SELECT * FROM FridgeFood WHERE FridgeID = :id";
                $stm = $db->prepare($q);
                $stm->bindParam(':id', $id);
                $stm->execute();
                $row = $stm->fetchAll();
                return $row;
	}

}

?>