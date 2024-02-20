<?php
require_once dirname(__FILE__) . '/../models/Order.php';
require_once dirname(__FILE__) . '/../models/User.php';
session_start();
?>

<head>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <?php
    require "../parts/navbar.php";
    ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["product_id"])) {
            $product_id = $_POST["product_id"];

            if (isset($_SESSION['user_email'])) {
                $user_email = $_SESSION['user_email'];

                try {
                    $user = User::getByEmail($user_email);
                    $user_id = $user->getId();
                    $order = new Order($user_id, $product_id);

                    if ($order->save()) {
                        echo "Order placed for 1 product.";
    ?>
                        <br><a href="/" class="btn btn-primary">Back to products</a>
    <?php
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
    ?>
</body>
