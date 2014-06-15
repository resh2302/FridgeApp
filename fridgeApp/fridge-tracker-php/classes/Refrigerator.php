<?php

require_once 'FridgeDB.php';
require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';


class Refrigerator {
	
	public function getRefrigerator($id)
	{
		$db = FridgeDB::getDB();
        $q = "SELECT * FROM Refrigerator WHERE ID = :id";
        $stm = $db->prepare($q);
        $stm->bindParam(':id', $id);
        $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return $row;
	}

}

?>