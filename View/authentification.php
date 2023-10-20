<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (isset($errorMessage) && !empty($errorMessage)) : ?>
                <div class="alert alert-danger">
                    <?php echo $errorMessage; ?>
                </div>
            <?php endif; ?>

            <form method="post" class="needs-validation" novalidate>
                <div class="form-group">
                    <input type="text" class="form-control" name="login" id="login" placeholder="Nom d'utilisateur" required>
                    <div class="invalid-feedback">
                        Veuillez entrer votre nom d'utilisateur.
                    </div>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe" required>
                    <div class="invalid-feedback">
                        Veuillez entrer votre mot de passe.
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
        </div>
    </div>
</div>
