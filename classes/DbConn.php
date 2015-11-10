<?php
if(!defined("FRAMEWORK_LOADED")){
    die ("Invalid enter!");
}
class DbConn
{
    const DB_HOST = "";
    const DB_USER = "";
    const DB_PASS = "";
    const DB_NAME = "";
    public static $conn = null;
    public static function getConn(){
        try{
            if(!self::$conn)
                self::$conn = new PDO('mysql:dbname='.self::DB_NAME.';host='.self::DB_HOST.';', self::DB_USER, self::DB_PASS);
        } catch(PDOException $e){
            echo "An error occured: ". $e->getMessage();
        }
        return self::$conn;
    }
}