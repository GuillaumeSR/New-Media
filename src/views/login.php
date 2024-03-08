<section class="login">
<div class="container">
    <form action="?page=login" method="post">
        <h1>Se connecter</h1>
        <div class="form-control">
            <label for="email">Adresse email : </label>
            <input type="email" id="email" name="email" autofocus placeholder="Email" id="username" required/>
        </div>
        <div class="form-control">
            <label for="password">Mot de passe : </label>
            <input type="password" id="password" name="password" placeholder="Password" id="password" required/>
        </div>
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
        <button type="submit" value="login" class="btn">Se connecter</button>
        <p class="text">Vous n'avez pas de compte ? <a href="?page=register">Inscrivez-vous</a></p>
    </form>
</div>
</section>