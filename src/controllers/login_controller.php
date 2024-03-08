<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $bdd->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['admin_status'] = $user['admin_status'];
        $_SESSION['logged'] = true;

        header('Location: ?page=homepage');
        exit();
    } else {
        echo 'Invalid email or password';
    }
}

require '../src/views/login.php';