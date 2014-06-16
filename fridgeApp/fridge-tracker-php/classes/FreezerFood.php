<?php

require_once 'FridgeDB.php';
require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';


class FreezerFood {
	
        public function insertFood($id, $name, $qty, $cat, $date, $img)
        {
                $db = FridgeDB::getDB();
                $q = "INSERT INTO FreezerFood (ImgURL, Name, ExpiryDate, Qty, Category, FreezerID) VALUES (:img, :name, :expDate, :qty, :cat, :id)";
                $stm = $db->prepare($q);
                $stm->bindParam(':id', $id);
                $stm->bindParam(':name', $name);
                $stm->bindParam(':expDate', $date);
                $stm->bindParam(':qty', $qty);
                $stm->bindParam(':cat', $cat);
                $stm->bindParam(':img', $img);
                
                $status = $stm->execute();
                return $status;
        }

        public function getFoodbyID($id)
        {
                $db = FridgeDB::getDB();
                $q = "SELECT * FROM FreezerFood WHERE ID = :id";
                $stm = $db->prepare($q);
                $stm->bindParam(':id', $id);
                $stm->execute();
                $row = $stm->fetch(); //PDO::FETCH_ASSOC
                return $row;
        }

	public function getFoodbyFreezer($id)
	{
		$db = FridgeDB::getDB();
                $q = "SELECT * FROM FreezerFood WHERE FreezerID = :id";
                $stm = $db->prepare($q);
                $stm->bindParam(':id', $id);
                $stm->execute();
                $row = $stm->fetchAll();
                return $row;
	}

        public function deleteFood($id)
        {
                $db = FridgeDB::getDB();
                $q = "DELETE FROM FreezerFood WHERE ID = :id";
                $stm = $db->prepare($q);
                $stm->bindParam(':id', $id);
                $status = $stm->execute();
                return $status;
        }

        public function updateFood($id, $name, $qty, $cat, $date, $img)
        {
                $db = FridgeDB::getDB();
                $q = "UPDATE FreezerFood SET ImgURL = :img, Name = :name, ExpiryDate = :expDate, Qty = :qty, Category = :cat WHERE ID = :id";
                $stm = $db->prepare($q);
                $stm->bindParam(':id', $id);
                $stm->bindParam(':name', $name);
                $stm->bindParam(':expDate', $date);
                $stm->bindParam(':qty', $qty);
                $stm->bindParam(':cat', $cat);
                $stm->bindParam(':img', $img);
                
                $status = $stm->execute();
                // echo $date;
                return $status;
        }
}

?>