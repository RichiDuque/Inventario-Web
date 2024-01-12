<?php
class Database {
    public static $db;
    public static $con;
    public static $user = "root";
    public static $pass = "";
    public static $host = "localhost";
    public static $ddbb = "inventiolite";

    public static function connect(){
        $con = new mysqli(self::$host, self::$user, self::$pass, self::$ddbb);
        $con->query("set sql_mode=''");
        return $con;
    }

    public static function getCon(){
        if(self::$con == null && self::$db == null){
            self::$db = new Database();
            self::$con = self::$db->connect();
        }
        return self::$con;
    }
}


?>
