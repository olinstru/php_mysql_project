<?php
require_once dirname(__FILE__) . '/../bdd/db.php';

class Product
{
    private $id;
    private $name;
    private $price;
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    // public function setName($name)
    // {
    //     if (strlen($name) < 2) {
    //         throw new Exception("Nom trop court.");
    //     }
    //     $this->name = $name;
    //     return $this;
    // }

    // public function setPrice($price)
    // {
    //     if (!is_numeric($price) || $price <= 0) {
    //         throw new Exception("Prix invalide.");
    //     }
    //     $this->price = $price;
    //     return $this;
    // }

    public static function getList()
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        $stmt = $dbh->prepare("SELECT id, name, price FROM product");

        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function get($product_id)
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        try {
            $stmt = $dbh->prepare("SELECT id, name, price FROM product WHERE id = :product_id");
            $stmt->bindParam(':product_id', $product_id);

            $stmt->execute();
            return $stmt->fetchObject(__CLASS__);
        } catch (PDOException $e) {
            throw new Error($e);
        }
    }
}
