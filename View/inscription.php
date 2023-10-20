<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?php if (isset($errorMessage) && !empty($errorMessage)) : ?>
                        <div class="alert alert-danger">
                            <?php echo $errorMessage; ?>
                        </div>
                    <?php endif; ?>

                    <form method="post">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="login" id="login" placeholder="Entrez votre nom d'utilisateur" required>
                        </div>

                        <div class="form-group mb-3">
                            <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" placeholder="Entrez votre mot de passe" required>
                        </div>
                        <div class="form-group mb-3">
                            <select class="form-control mb-3" id="id_role" name="id_role" required>
                                <option value="" disabled selected>Choisissez un rôle</option>
                                <option value="1">Admin</option>
                                <option value="2">Secrétaire</option>
                                <option value="3">Bénévole</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">S'inscrire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
