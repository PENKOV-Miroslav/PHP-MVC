<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
                    <div class="alert alert-danger">
                        <?php echo htmlspecialchars($_SESSION['error']); ?>
                    </div>
                    <?php unset($_SESSION['error']); // Effacez le message d'erreur après l'avoir affiché ?>
                <?php endif; ?>

                    <form method="post" class="needs-validation" novalidate>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="login" id="login" placeholder="Entrez votre nom d'utilisateur" required>
                            <div class="invalid-feedback">
                                Veuillez entrer votre nom d'utilisateur.
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" placeholder="Entrez votre mot de passe" required>
                            <div class="invalid-feedback">
                                Veuillez entrer votre mot de passe.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
