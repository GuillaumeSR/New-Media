<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = md5(uniqid(mt_rand(), true));
}

if (isset($_GET['kill']) && $_GET['kill'] === "all") {
    session_destroy();
    header("location: ?page=homepage");
    exit();
}

require '../src/models/connect_pdo.php';
