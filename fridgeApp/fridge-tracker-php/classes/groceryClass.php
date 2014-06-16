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
        public function InsertFreezer($ID,$ItemName,$Freezer_id){
           $db=  FridgeDB::getDB();
            $q="Insert into GroceryFreezer where ID=:ID,ItemName=:ItemName,Freezer_id=:Freezer_id";
            $stm=$db->prepare($q);
            $stm->bindParam(':ID',$ID);
            $stm->bindParam(':ItemName',$ItemName);
            $stm->bindParam(':Freezer_id',$Freezer_id);
            $stm->execute();
            $row=$stm->fetch();
            return $row;  
        }
}


