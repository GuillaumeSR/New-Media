<?php
if (isset($_SESSION['logged']) & $_SESSION['logged']) {
    session_unset();
    header('location: ?page=homepage');
    exit();
}