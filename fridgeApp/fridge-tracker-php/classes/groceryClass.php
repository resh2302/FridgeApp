<?php
require_once 'FridgeDB.php';
require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';

class groceryClass{
     public function getGrocerybyID($id)
        {
                $db = FridgeDB::getDB();
                $q = "SELECT * FROM GroceryFridge WHERE ID = :id";
                $stm = $db->prepare($q);
                $stm->bindParam(':id', $id);
                $stm->execute();
                $row = $stm->fetch(); //PDO::FETCH_ASSOC
                return $row;
        }  
}


