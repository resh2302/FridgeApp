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
        public function InsertFridge($ID,$ItemName,$FridgeID){
            $db=  FridgeDB::getDB();
            $q="Insert into GroceryFridge where ID=:ID,ItemName=:ItemName,FridgeID=:FridgeID";
            $stm=$db->prepare($q);
            $stm->bindParam(':ID',$ID);
            $stm->bindParam(':ItemName',$ItemName);
            $stm->bindParam(':FridgeID',$FridgeID);
            $stm->execute();
            $row=$stm->fetch();
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


