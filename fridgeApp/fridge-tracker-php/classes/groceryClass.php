<?php
require_once 'FridgeDB.php';
require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';

class groceryClass{
     public function getGrocerybyFridgeID($id)
        {
                $db = FridgeDB::getDB();
                $q = "SELECT * FROM GroceryFridge WHERE FridgeID = :id";
                $stm = $db->prepare($q);
                $stm->bindParam(':id', $id);
                $stm->execute();
                $row = $stm->fetchAll(); //PDO::FETCH_ASSOC
                return $row;
        }
        public function InsertFridge($itemname,$fridgeid){
            $db=  FridgeDB::getDB();
            $q="Insert into GroceryFridge(ItemName,FridgeID) values (:itemname,:fridgeid)";
            $stm=$db->prepare($q);
//            $stm->bindParam(':id',$id);
            $stm->bindParam(':itemname',$itemname);
      $stm->bindParam(':fridgeid',$fridgeid);
           $row= $stm->execute();
           return $row;
        }
        
             public function updateFridge($id, $itemname)
        {
                $db = FridgeDB::getDB();
                $q = "UPDATE GroceryFridge SET ItemName = :itemname WHERE ID = :id";
                $stm = $db->prepare($q);
                $stm->bindParam(':id', $id);
                $stm->bindParam(':itemname', $itemname);
                $row = $stm->execute();
                return $row;
        }
             public function deleteFridge($id)
        {
                $db = FridgeDB::getDB();
                $q = "DELETE FROM GroceryFridge WHERE ID = :id";
                $stm = $db->prepare($q);
                $stm->bindParam(':id', $id);
                $row = $stm->execute();
                return $row;
        }
         public function getGrocerybyFreezerID($id)
        {
                $db = FridgeDB::getDB();
                $q = "SELECT * FROM GroceryFreezer WHERE Freezer_id = :id";
                $stm = $db->prepare($q);
                $stm->bindParam(':id', $id);
                $stm->execute();
                $row = $stm->fetchAll(); //PDO::FETCH_ASSOC
                return $row;
        }
        public function InsertFreezer($itemname,$freezerid){
           $db=  FridgeDB::getDB();
           $q="Insert into GroceryFreezer(ItemName,Freezer_id) values (:itemname,:freezerid)";
            $stm=$db->prepare($q);
//            $stm->bindParam(':id',$id);
            $stm->bindParam(':itemname',$itemname);
      $stm->bindParam(':freezerid',$freezerid);
           $row= $stm->execute();
           return $row;
        }
         public function updateFreezer($id, $itemname)
        {
                $db = FridgeDB::getDB();
                $q = "UPDATE GroceryFreezer SET ItemName = :itemname WHERE ID = :id";
                $stm = $db->prepare($q);
                $stm->bindParam(':id', $id);
                $stm->bindParam(':itemname', $itemname);
                $row = $stm->execute();
                return $row;
        }
             public function deleteFreezer($id)
        {
                $db = FridgeDB::getDB();
                $q = "DELETE FROM GroceryFreezer WHERE ID = :id";
                $stm = $db->prepare($q);
                $stm->bindParam(':id', $id);
                $row = $stm->execute();
                return $row;
        }
}


