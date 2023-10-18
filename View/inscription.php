<div class="container">
    <?php if (!empty($erreur)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $erreur; ?>
        </div>
    <?php } ?>
    <form method="post">
        <div class="mb-3">
            <label for="login" class="form-label">Login :</label>
            <input type="text" id="login" name="login" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="mot_de_passe" class="form-label">Mot de passe :</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" class="form-control" required>
        </div>
        <button type="submit" name="inscription" class="btn btn-primary">S'inscrire</button>
    </form>
</div>
