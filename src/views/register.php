<section class="register">
<div class="container">
    <form action="?page=register" method="post">
        <h1>S'inscrire</h1>
        <div class="form-control">
            <label for="name">Pseudo : </label>
            <input type="text" id="name" name="name" required/>
        </div>
        <div class="form-control">
            <label for="email">Email : </label>
            <input type="email" id="email" name="email" autocomplete="off" required/>
        </div>
        <div class="form-control">
            <label for="password">Mot de passe : </label>
            <input type="password" id="password" name="password" required/>
        </div>
        <div class="form-control">
            <label for="confirm-password">Confirmation mot de passe : </label>
            <input type="confirm-password" id="confirm-password" name="confirm-password" required/>
        </div>
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
        <button type="submit" value="register" class="btn">Inscription</button>
        <p class="text">Vous avez déjà un compte ? <a href="?page=login">Connectez-vous</a></p>
    </form>
</div>
</section>