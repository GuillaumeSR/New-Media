<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <header>
    <nav class="container">
            <div class="logo">
                <img src="../assets/img/blog-1027861_640.webp" alt="logo">
            </div>
            <div class="navbar">
                <?php if (!isset($_SESSION['logged']) || !$_SESSION['logged']) { ?>
                    <a href="?page=homepage">Retour</a>
                    <a href="?page=login" class='right'>Login/Register</a>
                <?php } elseif ($_SESSION['logged'] & $_SESSION['admin_status']) { ?>
                    <a href="?page=homepage">Retour</a>
                    <a href="?page=user_articles" class='right'>My articles</a>
                    <a href="?page=disconnect" class='right'>Disconnect</a>
                    <div class="dropdown">
                        <button class="dropbtn">Admin ▼</button>
                        <div class="dropdown-content">
                            <a href="?page=modify_category">Categories</a>
                            <a href="?page=best_sold">Gestion</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <a href="?page=homepage">Retour</a>
                    <a href="?page=disconnect" class='right'>Disconnect</a>
                    <div class="dropdown">
                        <button class="dropbtn">Customer ▼</button>
                        <div class="dropdown-content">
                            <a href="?page=profile">Profile</a>
                            <a href="?page=user_articles">My articles</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </nav>
    </header>
    <main>
        <?php require '../src/controllers/' . $route . '_controller.php'; ?>
    </main>
    <footer class="container">
        <p>&copy; 2024 New Media. All rights reserved.</p>
    </footer>
</body>
</html>
