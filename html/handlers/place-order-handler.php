<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["product_id"])) {
        $productId = $_POST["product_id"];
        $message = "Order placed for product ID: " . $productId;
        echo $message;
    } else {
        echo "Error: Product ID not provided.";
    }
} else {
    // Redirect back to the product list page if accessed directly
    header("Location: product_list.php");
    exit();
}
