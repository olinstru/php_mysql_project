<?php
require_once dirname(__FILE__) . '/../bdd/db.php';

class User
{
    static private $TABLE_NAME = 'users';
    private $email;
    private $hashedPassword;

    public function __construct($email = null, $password = null)
    {
        if (!empty($email)) {
            $this->setEmail($email);
        }
        if (!empty($password)) {
            $this->setPassword($password);
        }
    }

    public function setEmail($newEmail)
    {
        if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format");
        }
        $this->email = $newEmail;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($newPassword)
    {
        if (strlen($newPassword) < 6) {
            throw new Exception("Password must be at least 6 characters long");
        }
        $this->hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        return $this;
    }

    public function getHashedPassword()
    {
        return $this->hashedPassword;
    }

    public static function verifyPassword($email, $password): bool|User
    {
        try {
            global $dsn, $db_user, $db_pass;
            $dbh = new PDO($dsn, $db_user, $db_pass);

            $stmt = $dbh->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $hashedPassword = $user['password'];

                if (password_verify($password, $hashedPassword)) {
                    return true;
                }
            }

            return false;
        } catch (PDOException $e) {
            throw new Error($e->getMessage());
        }
    }

    public static function getByEmail($email)
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        $stmt = $dbh->prepare("SELECT * FROM " . self::$TABLE_NAME . " WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetchObject('User');

        if ($user) {
            return $user;
        } else {
            throw new Exception("User not found with email: $email");
        }
    }

    public function save()
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        try {
            $stmt = $dbh->prepare("INSERT INTO " . self::$TABLE_NAME . " (email, password) VALUES (:email, :password)");
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->hashedPassword);

            return $stmt->execute();
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                throw new Exception("This email is already in use. Please choose a different email.");
            } else {
                throw new Exception("An error occurred while saving the user.");
            }
        }
    }
}