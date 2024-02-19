<?php
require_once dirname(__FILE__) . '/../models/Order.php';
require_once dirname(__FILE__) . '/../models/User.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["product_id"])) {
        $product_id = $_POST["product_id"];

        // Check if the user email is set in the session
        if (isset($_SESSION['user_email'])) {
            $user_email = $_SESSION['user_email'];

            try {
                // Get the user object based on the email
                $user = User::getByEmail($user_email);

                // Retrieve the user ID using the getId() method
                $user_id = $user->getId();

                // Create an instance of the Order class with user and product IDs
                $order = new Order($user_id, $product_id);

                // Save the order
                if ($order->save()) {
                    echo "Order placed for product ID: " . $product_id;
                } else {
                    echo "Error placing order.";
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "Error: User email not found in session.";
        }
    } else {
        echo "Error: Product ID not provided.";
    }
} else {
    header("Location: product_list.php");
    exit();
}
