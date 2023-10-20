<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <?php if (isset($errorMessage) && !empty($errorMessage)) : ?>
            <div class="alert alert-danger">
                <?php echo $errorMessage; ?>
            </div>
            <?php endif; ?>
            
            <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="login" id="login" placeholder="Nom d'utilisateur" required>
                </div>
                
                <div class="form-group">
                    <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe" required>
                </div>

                <div class="form-group">
                    <select class="form-control" id="id_role" name="id_role" required>
                        <option value="" disabled selected>Sélectionner un rôle</option>
                        <option value="1">Admin</option>
                        <option value="2">Secrétaire</option>
                        <option value="3">Bénévole</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
        </div>
    </div>
</div>
