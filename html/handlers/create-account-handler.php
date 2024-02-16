<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once(dirname(__FILE__) . '/../models/User.php');

    try {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new User();

        $user->setEmail($email);
        $user->setPassword($password);

        if ($user->save()) {
            echo "User account created successfully!";
        } else {
            echo "Failed to create user account. Please try again later.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
