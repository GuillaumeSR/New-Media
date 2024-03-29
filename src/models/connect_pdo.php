<?php

if (PHP_OS == 'Darwin') {
    try {
        $bdd = new PDO(
            'mysql:host=localhost;dbname=newmedia;charset=utf8',
            'root',
            'root'
        );
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Error : ' . $e->getMessage());
    }
} elseif (PHP_OS == 'WINNT') {
    try {
        $bdd = new PDO(
            'mysql:host=localhost;dbname=newmedia;charset=utf8',
            'root',
            ''
        );
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Error : ' . $e->getMessage());
    }
} else {
    
}
