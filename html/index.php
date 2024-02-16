<?php
session_start();
$logged_in = isset($_SESSION['user_id']);
?>

<html lang="fr">

<head>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- NAVBAR -->
    <?php
    require "parts/navbar.php";
    ?>

    <?php if (!$logged_in) : ?>
        <!-- Show login and register forms if user is not logged in -->
        <?php require "parts/forms/login-form.php"; ?>
        <?php require "parts/forms/create-account-form.php"; ?>
    <?php else : ?>
        <!-- Show product list if user is logged in -->
        <?php require "parts/product-list.php"; ?>
    <?php endif; ?>


</body>

</html>