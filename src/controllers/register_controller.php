<?php

if (!isset($_SESSION['registered'])) {
    $_SESSION['registered'] = false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {
    if (!empty($_POST)) {
        if (empty($_POST['name'])) {
            echo 'Veuillez renseigner votre prénom';
        } elseif (empty($_POST['email'])) {
            echo 'Veuillez renseigner votre email';
        } elseif (empty($_POST['password'])) {
            echo 'Veuillez renseigner votre mot de passe';
        } elseif (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
            echo 'Veuillez rentrer une adresse mail valide';
        } elseif (strlen($_POST['password']) < 8) {
            echo "Veuillez rentrer un mot de passe d'au minimum 8 caractères";
        } elseif ($_POST['password'] !== $_POST['confirm-password']) {
            echo "Veuillez confirmer votre mot de passe";
        } else {
            $_SESSION['registered'] = true;
        }

    }
    if ($_SESSION['registered'] == true) {

        $user = new User($_POST['name'], $_POST['email'], $_POST['password']);

        $user->insertIntoDatabase();

        // $firstname = $_POST['firstname'];
        // $lastname = $_POST['lastname'];
        // $email = $_POST['email'];
        // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // $stmt = $bdd->prepare('INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)');

        // try {
        //     $stmt->execute([$firstname, $lastname, $email, $password]);
        //     echo 'Compte créer avec succès !';
        // } catch (PDOException $e) {
        //     echo 'Error: ' . $e->getMessage();
        // }
        $_SESSION['registered'] = false;
        $_SESSION['logged'] = true;
        $_SESSION['admin_status'] = 0;

        header('Location: ?page=homepage');
        exit();
    }
}

require '../src/views/register.php';