<h1>Inscription</h1>
    <?php if (!empty($erreur)) { ?>
        <p style="color: red;"><?php echo $erreur; ?></p>
    <?php } ?>
    <form method="post">
        <label for="login">Login :</label>
        <input type="text" id="login" name="login" required>
        <br>
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>
        <br>
        <input type="submit" name="inscription" value="S'inscrire">
    </form>