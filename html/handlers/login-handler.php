<?php
require_once(dirname(__FILE__) . '/../models/User.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo 'Please send data using POST method';
    exit();
}

$email = filter_var($_POST["email"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = filter_var($_POST["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (empty($email) || empty($password)) {
    echo "Incomplete login information";
    exit();
}

try {
    if (User::verifyPassword($email, $password) === false) {
        echo 'Error: Incorrect credentials!';
        exit();
    }
    $user_id = User::getByEmail($email);
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_email'] = $email;
    header("Location: ../index.php");
    exit();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
