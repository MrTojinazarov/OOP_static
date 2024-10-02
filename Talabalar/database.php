<?php
class Database
{
    protected static $host = 'localhost';
    protected static $username = 'root';
    protected static $password = 'mr2344';
    protected static $dbname = "dars14";

    public static $connect;
    
    public static function connect_func()
    {
        self::$connect = new PDO("mysql:host=". self::$host.";dbname=".self::$dbname, self::$username, self::$password);
    }
}
?>

