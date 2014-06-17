<?php

/**
 * Class FRIDGE is used to get the connection to the database
 *
 * @author Jackie Liu I AM A BACKEND DEVELOPER!!!!! I LOVE DATABASE
 */

class FridgeDB {
    //put your code here
  // private static $user = 'frdige_user';
  // private static $pass = 'a$b6Es03';
  // private static $dsn = "mysql:host=50.62.209.49:3306;dbname=frdige-tracker";
  
     private static $user = "ben";
     private static $pass = "123123";
     private static $dsn = "mysql:host=localhost;dbname=frdige-tracker";
    
    private static $db;
    public static function getDB()
    {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$user, self::$pass);
//                FB::log("Database Connected");
            } catch (PDOException $ex) {
                echo "Error occured : " . $ex->getMessage();
            }
        }
        return self::$db;
    }
}
