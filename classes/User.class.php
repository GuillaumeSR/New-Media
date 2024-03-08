<?php

class User {
    public $id;
    public $name;
    public $email;
    public $password;
    public $admin_status;

    public function __construct($name, $email, $password, $admin_status = 0) {
        $this->id = null;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->admin_status = $admin_status;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getAdminStatus() {
        return $this->admin_status;
    }

    public function insertIntoDatabase() {
        if (PHP_OS == 'Darwin') {
            try {
                $conn = new PDO(
                    'mysql:host=localhost;dbname=newmedia;charset=utf8',
                    'root',
                    'root'
                );
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Error : ' . $e->getMessage());
            }
        } elseif (PHP_OS == 'WINNT') {
            try {
                $conn = new PDO(
                    'mysql:host=localhost;dbname=newmedia;charset=utf8',
                    'root',
                    ''
                );
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Error : ' . $e->getMessage());
            }
        } else {
            
        }

        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (name, email, password, admin_status) VALUES (:name, :email, :password, :admin_status)");

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':admin_status', $this->admin_status);

        try {
            $stmt->execute();
            $this->id = $conn->lastInsertId();
            echo 'Compte créer avec succès !';
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $conn = null;
    }

    public static function getByEmail($email) {
        
        if (PHP_OS == 'Darwin') {
            try {
                $conn = new PDO(
                    'mysql:host=localhost;dbname=newmedia;charset=utf8',
                    'root',
                    'root'
                );
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Error : ' . $e->getMessage());
            }
        } elseif (PHP_OS == 'WINNT') {
            try {
                $conn = new PDO(
                    'mysql:host=localhost;dbname=newmedia;charset=utf8',
                    'root',
                    ''
                );
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Error : ' . $e->getMessage());
            }
        } else {
            
        }

        try {
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);

            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            return $user;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;

        return null;
    }
    
    public function verifyCredentials($enteredPassword) {
        return password_verify($enteredPassword, $this->password);
    }

    public function login($enteredPassword) {

        if (password_verify($enteredPassword, $this->password)) {

            $_SESSION['user_id'] = $this->id;
            $_SESSION['admin_status'] = $this->admin_status;

            return true;
        }

        return false;
    }
}