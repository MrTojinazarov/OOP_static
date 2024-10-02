<?php
include 'Database.php';
class Product extends Database
{
    public $name;
    public $price;
    public $count;
    public $con;
    public static $table = 'product';

    
    public static function getAll()
    {
        parent::connect_func();
        $sql = "SELECT * FROM " . self::$table;
        $statement = self::$connect->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function Show($id)
    {
        parent::connect_func();
        $sql = "SELECT * FROM " . self::$table . " WHERE id = $id";
        $statement = self::$connect->query($sql);
        return $statement->fetch(PDO::FETCH_ASSOC);

    }

    public static function Delete($id)
    {
        parent::connect_func();
        $sql = "DELETE FROM " . self::$table . " WHERE id = $id";
        self::$connect->exec($sql);
    }
}

?>