<?php
include 'database.php';
class Students extends Database
{
    public static $id;
    public static $fio;
    public static $phone;
    public static $manzil;
    public static $photo;
    protected static $table = 'students'; 

    public static function getAll()
    {
        parent::connect_func();
        $sql = "SELECT * FROM ". self::$table;
        $statement = self::$connect->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function insert()
    {
        parent::connect_func();
        $sql = "INSERT INTO ". self::$table ." (fio, phone, manzil, photo) VALUES (:fio, :phone, :manzil, :photo)";
        $statement = self::$connect->prepare($sql);

        self::$fio = htmlspecialchars(strip_tags(self::$fio));
        self::$phone = htmlspecialchars(strip_tags(self::$phone));
        self::$manzil = htmlspecialchars(strip_tags(self::$manzil));
        self::$photo = htmlspecialchars(strip_tags(self::$photo));

        $statement->bindParam(':fio', self::$fio);
        $statement->bindParam(':phone', self::$phone);
        $statement->bindParam(':manzil', self::$manzil);
        $statement->bindParam(':photo', self::$photo);

        if ($statement->execute()) {
            return self::$connect->lastInsertId(); 
        }
        return "Error: " . implode(":", $statement->errorInfo()); 
    }

    public static function delete()
    {
        parent::connect_func();
        $sql = "DELETE FROM ". self::$table . " WHERE id = :id";
        $statement = self::$connect->prepare($sql);

        self::$id = htmlspecialchars(strip_tags(self::$id));
        if (!is_numeric(self::$id)) {
            return "Invalid ID";
        }

        $statement->bindParam(':id', self::$id);

        if ($statement->execute()) {
            return "Deleted successfully";
        }
        return "Error: " . implode(":", $statement->errorInfo()); 
    }

    public static function update()
    {
        parent::connect_func();
        $sql = "UPDATE " . self::$table . " SET fio = :fio, phone = :phone, manzil = :manzil, photo = :photo WHERE id = :id";
        $statement = self::$connect->prepare($sql);

        self::$fio = htmlspecialchars(strip_tags(self::$fio));
        self::$phone = htmlspecialchars(strip_tags(self::$phone));
        self::$manzil = htmlspecialchars(strip_tags(self::$manzil));
        self::$photo = htmlspecialchars(strip_tags(self::$photo));
        self::$id = htmlspecialchars(strip_tags(self::$id));

        $statement->bindParam(':fio', self::$fio);
        $statement->bindParam(':phone', self::$phone);
        $statement->bindParam(':manzil', self::$manzil);
        $statement->bindParam(':photo', self::$photo);
        $statement->bindParam(':id', self::$id);

        if ($statement->execute()) {
            return 'Updated successfully';
        }

        return 'Update failed';
    }

    public static function getStudentById($id) {
        parent::connect_func();
        $sql = "SELECT * FROM ". self::$table . " WHERE id = :id";
        $statement = self::$connect->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
?>
