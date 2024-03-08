<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $bdd = new PDO(
            'mysql:host=localhost;dbname=newmedia;charset=utf8',
            'root',
            'root'
        );
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $name = $_POST['name'];
        $texte = $_POST['texte'];
        $user_id = $_POST['user_id'];
        $articles_id = $_POST['articles_id'];

        $sql = "INSERT INTO feedback (name, texte, user_id, articles_id) VALUES (?, ?, ?, ?)";
        $stmt = $bdd->prepare($sql);

        $stmt->execute([$name, $texte, $user_id, $articles_id]);
        
        echo "Nouveau feedback ajouté avec succès.";
    } catch (PDOException $e) {
        die('Error : ' . $e->getMessage());
    }
}
