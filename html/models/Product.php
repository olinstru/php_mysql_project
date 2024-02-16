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

    public static function getList()
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        $stmt = $dbh->prepare("SELECT id, name, price FROM products");

        $stmt->execute();
        $products = array();
        while ($row = $stmt->fetchObject(__CLASS__)) {
            $products[] = $row;
        }
        return $products;
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
