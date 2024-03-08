<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un feedback</title>
</head>
<body>
    <h2>Ajouter un feedback</h2>
    <form method="post" action="../manager/feedback_manager.php">
        <label for="name">Nom :</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="texte">Feedback :</label><br>
        <textarea id="texte" name="texte" required></textarea><br><br>
        <label for="user_id">ID Utilisateur :</label><br>
        <input type="number" id="user_id" name="user_id" required><br><br>
        <label for="articles_id">ID Article :</label><br>
        <input type="number" id="articles_id" name="articles_id" required><br><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
