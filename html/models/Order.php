<?php
require_once dirname(__FILE__) . '/../bdd/db.php';

class Order
{
    private $user_id;
    private $product_id;

    public function __construct($user_id, $product_id)
    {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getProductId()
    {
        return $this->product_id;
    }

    public function save()
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        try {
            $stmt = $dbh->prepare("INSERT INTO orders (user_id, product_id) VALUES (:user_id, :product_id)");
            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->bindParam(':product_id', $this->product_id);

            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Error($e);
        }
    }
}
